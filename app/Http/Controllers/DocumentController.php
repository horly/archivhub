<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentForm;
use App\Models\Chemise;
use App\Models\Document;
use App\Models\Room;
use App\Models\Site;
use App\Services\NotificationRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class DocumentController extends Controller
{
    //
    public function document($id_site, $id_room)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        $documents = Document::select('documents.*')
                    ->join('chemises', 'chemises.id', '=', 'documents.chemise_id')
                    ->join('classeurs', 'classeurs.id', '=', 'chemises.classeur_id')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->paginate(8);

        $documentsJ = Document::select('documents.*')
                    ->join('chemises', 'chemises.id', '=', 'documents.chemise_id')
                    ->join('classeurs', 'classeurs.id', '=', 'chemises.classeur_id')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->get();

        $documentsJson = Js::from($documentsJ->map(function ($document) use ($site, $room) {
            return [
                'id' => $document->id,
                'titre' => $document->titre,
                'reference' => $document->reference,
                'origine' => $document->origine,
                'context' => $document->context,
                'url' => route('app_add_document', ['id_site' => $site->id, 'id_room' => $room->id, 'id_document' => $document->id]),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }));

        return view('document.document', compact('site', 'room', 'documents', 'documentsJson'));
    }

    public function add_document($id_site, $id_room, $id_document)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        $chemises = Chemise::select('chemises.*')
                    ->join('classeurs', 'classeurs.id', '=', 'chemises.classeur_id')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->get();

        $document = Document::where('id', $id_document)->first();

        return view('document.add_document', compact('site', 'room', 'document', 'chemises'));
    }

    public function save_document(CreateDocumentForm $request)
    {
        if($request->input('request-type') != "edit")
        {
            $document = Document::create([
                'titre' => $request->input('document-titre'),
                'reference' => $request->input('document-reference'),
                'origine' => $request->input('document-source'),
                'detail_duree_conservation' => $request->input('document-dure-detail'),
                'duree_conservation' => $request->input('document-dure'),
                'context' => $request->input('document-context'),
                'chemise_id' => $request->input('document-folder'),
            ]);

            //Notification
            $url = route('app_document', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.added_a_document";
            NotificationRepo::setNotification($description, $url);
        }
        else
        {
            Document::where('id', $request->input('id'))
                ->update([
                    'titre' => $request->input('document-titre'),
                    'reference' => $request->input('document-reference'),
                    'origine' => $request->input('document-source'),
                    'detail_duree_conservation' => $request->input('document-dure-detail'),
                    'duree_conservation' => $request->input('document-dure'),
                    'context' => $request->input('document-context'),
                    'chemise_id' => $request->input('document-folder'),
                    'updated_at' => new \DateTimeImmutable,
            ]);

            //Notification
            $url = route('app_document', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.updated_a_document";
            NotificationRepo::setNotification($description, $url);
        }

        return redirect()->route('app_add_document', [
            'id_site' => $request->input('id_site'),
            'id_room' => $request->input('id_room'),
            'id_document' => $request->input('request-type') != "edit" ? $document->id : $request->input('id')])
                ->with('success', __('dashboard.data_saved_successfully'));
    }
}
