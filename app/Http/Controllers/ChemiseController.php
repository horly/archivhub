<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChemiseForm;
use App\Models\Boite;
use App\Models\Chemise;
use App\Models\Classeur;
use App\Models\Etagere;
use App\Models\Room;
use App\Models\Site;
use App\Services\NotificationRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class ChemiseController extends Controller
{
    //
    public function chemise($id_site, $id_room)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        $chemises = Chemise::select('chemises.*')
                    ->join('classeurs', 'classeurs.id', '=', 'chemises.classeur_id')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->paginate(8);

        $chemisesJ = Chemise::select('chemises.*')
                    ->join('classeurs', 'classeurs.id', '=', 'chemises.classeur_id')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->get();

        $chemisesJson = Js::from($chemisesJ->map(function ($chemise) use ($site, $room) {
            return [
                'id' => $chemise->id,
                'numero' => $chemise->numero,
                'description' => $chemise->description,
                'url' => route('app_add_chemise', ['id_site' => $site->id, 'id_room' => $room->id, 'id_chemise' => $chemise->id]),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }));

        return view('chemise.chemise', compact('site', 'room', 'chemises', 'chemisesJson'));
    }

    public function add_chemise($id_site, $id_room, $id_chemise)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        $classeurs = Classeur::select('classeurs.*')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->get();

        $chemise = Chemise::where('id', $id_chemise)->first();

        return view('chemise.add_chemise', compact('site', 'room', 'chemise', 'classeurs'));
    }

    public function save_chemise(CreateChemiseForm $request)
    {
        if($request->input('request-type') != "edit")
        {
            Chemise::create([
                'numero' => $request->input('chemise-number'),
                'description' => $request->input('chemise-description'),
                'classeur_id' => $request->input('chemise-classeur'),
            ]);

            //Notification
            $url = route('app_chemise', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.added_a_folder";
            NotificationRepo::setNotification($description, $url);
        }
        else
        {
            Chemise::where('id', $request->input('id'))
                ->update([
                    'numero' => $request->input('chemise-number'),
                    'description' => $request->input('chemise-description'),
                    'classeur_id' => $request->input('chemise-classeur'),
                    'updated_at' => new \DateTimeImmutable,
            ]);

            //Notification
            $url = route('app_chemise', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.updated_a_folder";
            NotificationRepo::setNotification($description, $url);
        }

        return redirect()->route('app_chemise', [
            'id_site' => $request->input('id_site'),
            'id_room' => $request->input('id_room')])->with('success', __('dashboard.data_saved_successfully'));
    }

    public function delete_chemise(Request $request)
    {
        $chemise = Chemise::where('id', $request->input('id_element'))->first();
        $classeur = Classeur::where('id', $chemise->classeur_id)->first();
        $boite = Boite::where('id', $classeur->boite_id)->first();
        $etagere = Etagere::where('id', $boite->etagere_id)->first();
        $room = Room::where('id', $etagere->armoire->room_id)->first();
        $site = Site::where('id', $room->site_id)->first();

        Chemise::where('id', $request->input('id_element'))->delete();

        //Notification
        $url = route('app_chemise', ['id_site' => $site->id, 'id_room' => $room->id]);
        $description = "dashboard.has_deleted_a_folder";
        NotificationRepo::setNotification($description, $url);

        return redirect($url)->with('success', __('dashboard.data_deleted_successfully'));
    }
}
