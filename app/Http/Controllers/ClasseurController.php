<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClasseurForm;
use App\Models\Boite;
use App\Models\Chemise;
use App\Models\Classeur;
use App\Models\Etagere;
use App\Models\Room;
use App\Models\Site;
use App\Services\NotificationRepo;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Js;

class ClasseurController extends Controller
{
    //
    public function classeur($id_site, $id_room)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        $classeurs = Classeur::select('classeurs.*')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->paginate(8);

        $classeursJ = Classeur::select('classeurs.*')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->get();

        $classeursJson = Js::from($classeursJ->map(function ($classeur) use ($site, $room) {
            return [
                'id' => $classeur->id,
                'numero' => $classeur->numero,
                'description' => $classeur->description,
                'url' => route('app_add_classeur', ['id_site' => $site->id, 'id_room' => $room->id, 'id_classeur' => $classeur->id]),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }));

        $iSpermission = PermissionService::userHasPermission(Auth::user()->id);

        return view('classeur.classeur', compact('site', 'room', 'classeurs', 'classeursJson', 'iSpermission'));
    }

    public function add_classeur($id_site, $id_room, $id_classeur)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        $boites = Boite::select('boites.*')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->get();

        $classeur = Classeur::where('id', $id_classeur)->first();

        $chemises = collect(); //Dossiers

        if($classeur)
        {
            $chemises = Chemise::where('classeur_id', $classeur->id)->get();
        }

        $iSpermission = PermissionService::userHasPermission(Auth::user()->id);

        return view('classeur.add_classeur', compact('site', 'room', 'classeur', 'boites', 'chemises', 'iSpermission'));
    }

    public function save_classeur(CreateClasseurForm $request)
    {
        if($request->input('request-type') != "edit")
        {
            Classeur::create([
                'numero' => $request->input('classeur-number'),
                'description' => $request->input('classeur-description'),
                'boite_id' => $request->input('classeur-boite'),
            ]);

            //Notification
            $url = route('app_classeur', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.added_a_binder";
            NotificationRepo::setNotification($description, $url);
        }
        else
        {
            Classeur::where('id', $request->input('id'))
                ->update([
                    'numero' => $request->input('classeur-number'),
                    'description' => $request->input('classeur-description'),
                    'boite_id' => $request->input('classeur-boite'),
                    'updated_at' => new \DateTimeImmutable,
            ]);

            //Notification
            $url = route('app_classeur', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.updated_a_binder";
            NotificationRepo::setNotification($description, $url);
        }

        return redirect()->route('app_classeur', [
            'id_site' => $request->input('id_site'),
            'id_room' => $request->input('id_room')])->with('success', __('dashboard.data_saved_successfully'));
    }

    public function delete_classeur(Request $request)
    {
        $classeur = Classeur::where('id', $request->input('id_element'))->first();
        $boite = Boite::where('id', $classeur->boite_id)->first();
        $etagere = Etagere::where('id', $boite->etagere_id)->first();
        $room = Room::where('id', $etagere->armoire->room_id)->first();
        $site = Site::where('id', $room->site_id)->first();

        Classeur::where('id', $request->input('id_element'))->delete();

        //Notification
        $url = route('app_classeur', ['id_site' => $site->id, 'id_room' => $room->id]);
        $description = "dashboard.has_deleted_a_binder";
        NotificationRepo::setNotification($description, $url);

        return redirect($url)->with('success', __('dashboard.data_deleted_successfully'));
    }
}
