<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtagereForm;
use App\Models\Armoire;
use App\Models\Boite;
use App\Models\Etagere;
use App\Models\Room;
use App\Models\Site;
use App\Services\NotificationRepo;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Js;

class EtagereController extends Controller
{
    //
    public function etagere($id_site, $id_room)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        $etageres = Etagere::select('etageres.*')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->paginate(8);

        $etageresJ = Etagere::select('etageres.*')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->get();


        $etageresJson = Js::from($etageresJ->map(function ($etagere) use ($site, $room) {
            return [
                'id' => $etagere->id,
                'numero' => $etagere->numero,
                'description' => $etagere->description,
                'url' => route('app_add_etagere', ['id_site' => $site->id, 'id_room' => $room->id, 'id_etagere' => $etagere->id]),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }));

        $iSpermission = PermissionService::userHasPermission(Auth::user()->id);

        return view('etagere.etagere', compact('site', 'room', 'etageres', 'etageresJson', 'iSpermission'));
    }

    public function add_etagere($id_site, $id_room, $id_etagere)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();
        $armoires = Armoire::where('room_id', $room->id)->get();
        $etagere = Etagere::where('id', $id_etagere)->first();

        $boites = collect();

        if($etagere)
        {
            $boites = Boite::where('etagere_id', $etagere->id)->get();
        }

        $iSpermission = PermissionService::userHasPermission(Auth::user()->id);

        return view('etagere.add_etagere', compact('site', 'room', 'etagere', 'armoires', 'boites', 'iSpermission'));
    }


    public function save_etagere(CreateEtagereForm $request)
    {
        if($request->input('request-type') != "edit")
        {
            Etagere::create([
                'numero' => $request->input('etagere-number'),
                'description' => $request->input('etagere-description'),
                'armoire_id' => $request->input('etagere-armoire'),
            ]);

             //Notification
            $url = route('app_etagere', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.added_a_shelve";
            NotificationRepo::setNotification($description, $url);
        }
        else
        {
            Etagere::where('id', $request->input('id'))
                ->update([
                    'numero' => $request->input('etagere-number'),
                    'description' => $request->input('etagere-description'),
                    'armoire_id' => $request->input('etagere-armoire'),
                    'updated_at' => new \DateTimeImmutable,
            ]);

            //Notification
            $url = route('app_etagere', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.updated_a_shelve";
            NotificationRepo::setNotification($description, $url);
        }

        return redirect()->route('app_etagere', [
            'id_site' => $request->input('id_site'),
            'id_room' => $request->input('id_room')])->with('success', __('dashboard.data_saved_successfully'));
    }

    public function delete_etagere(Request $request)
    {
        $etagere = Etagere::where('id', $request->input('id_element'))->first();
        $room = Room::where('id', $etagere->armoire->room_id)->first();
        $site = Site::where('id', $room->site_id)->first();

        Etagere::where('id', $request->input('id_element'))->delete();

        //Notification
        $url = route('app_etagere', ['id_site' => $site->id, 'id_room' => $room->id]);
        $description = "dashboard.has_deleted_a_shelve";
        NotificationRepo::setNotification($description, $url);

        return redirect($url)->with('success', __('dashboard.data_deleted_successfully'));
    }
}
