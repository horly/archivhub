<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArmoireForm;
use App\Models\Armoire;
use App\Models\Etagere;
use App\Models\Room;
use App\Models\Site;
use App\Services\NotificationRepo;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Js;

class ArmoireController extends Controller
{
    //
    public function armoire($id_site, $id_room, Request $request)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        /*
        $searchTerm = $request->input('search');
        $armoires = collect();

        if ($searchTerm) {
            $armoires = Armoire::where('id_room', $room->id)
                            ->where(function ($query) use ($searchTerm) {
                                $query->where('numero', 'LIKE', $searchTerm . '%')
                                    ->orWhere('description', 'LIKE', $searchTerm . '%');
                            })
                            ->paginate(8);

            $armoiresJ = Armoire::where('id_room', $room->id)->get();
            //$armoiresJson = $armoiresJ->toJson();
            $armoiresJson = Js::from($armoiresJ->map(function ($armoire) use ($site, $room) {
                return [
                    'id' => $armoire->id,
                    'numero' => $armoire->numero,
                    'description' => $armoire->description,
                    'url' => route('app_add_armoire', ['id_site' => $site->id, 'id_room' => $room->id, 'id_armoire' => $armoire->id]),
                    // Ajoutez d'autres propriétés si nécessaire
                ];
            }));
        }
        else
        {*/
            $armoires = Armoire::where('room_id', $room->id)->paginate(8);
            $armoiresJ = Armoire::where('room_id', $room->id)->get();

            //$armoiresJson = $armoiresJ->toJson();

            $armoiresJson = Js::from($armoiresJ->map(function ($armoire) use ($site, $room) {
                return [
                    'id' => $armoire->id,
                    'numero' => $armoire->numero,
                    'description' => $armoire->description,
                    'url' => route('app_add_armoire', ['id_site' => $site->id, 'id_room' => $room->id, 'id_armoire' => $armoire->id]),
                    // Ajoutez d'autres propriétés si nécessaire
                ];
            }));
        //}

        $iSpermission = PermissionService::userHasPermission(Auth::user()->id);

        return view('armoire.armoire', compact('site', 'room', 'armoires', 'armoiresJson', 'iSpermission'));
    }

    public function add_armoire($id_site, $id_room, $id_armoire)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();
        $armoire = Armoire::where('id', $id_armoire)->first();

        $etageres = collect();

        if($armoire)
        {
            $etageres = Etagere::where('armoire_id', $armoire->id)->get();
        }

        $iSpermission = PermissionService::userHasPermission(Auth::user()->id);

        return view('armoire.add_armoire', compact('site', 'room', 'armoire', 'etageres', 'iSpermission'));
    }

    public function save_armoire(CreateArmoireForm $request)
    {
        //dd($request->all());

        if($request->input('request-type') != "edit")
        {
            Armoire::create([
                'numero' => $request->input('armoire-number'),
                'description' => $request->input('armoire-description'),
                'room_id' => $request->input('id_room'),
            ]);

            //Notification
            $url = route('app_armoire', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.added_a_armoire";
            NotificationRepo::setNotification($description, $url);
        }
        else
        {
            Armoire::where('id', $request->input('id'))
                ->update([
                    'numero' => $request->input('armoire-number'),
                    'description' => $request->input('armoire-description'),
                    'room_id' => $request->input('id_room'),
                    'updated_at' => new \DateTimeImmutable,
            ]);

            //Notification
            $url = route('app_armoire', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.has_modified_a_armoire";
            NotificationRepo::setNotification($description, $url);
        }

        return redirect()->route('app_armoire', [
            'id_site' => $request->input('id_site'),
            'id_room' => $request->input('id_room')])->with('success', __('dashboard.data_saved_successfully'));
    }

    public function delete_armoire(Request $request)
    {
        $armoire = Armoire::where('id', $request->input('id_element'))->first();
        $room = Room::where('id', $armoire->room_id)->first();
        $site = Site::where('id', $room->site_id)->first();

        Armoire::where('id', $request->input('id_element'))->delete();

        //Notification
        $url = route('app_armoire', ['id_site' => $site->id, 'id_room' => $room->id]);
        $description = "dashboard.has_deleted_a_cabinet";
        NotificationRepo::setNotification($description, $url);

        return redirect($url)->with('success', __('dashboard.data_deleted_successfully'));
    }
}
