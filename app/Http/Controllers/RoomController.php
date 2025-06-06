<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomForm;
use App\Models\Room;
use App\Models\Site;
use App\Services\NotificationRepo;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Js;

class RoomController extends Controller
{
    //
    public function room($id_site)
    {
        $rooms = Room::where('site_id', $id_site)->paginate(6);
        $roomsJ = Room::where('site_id', $id_site)->get();
        $site = Site::where('id', $id_site)->first();

        $roomsJson = Js::from($roomsJ->map(function ($room) use ($site) {
            return [
                'id' => $room->id,
                'name' => $room->name,
                'description' => $room->description,
                'url' => route('app_dashboard', ['id_site' => $site->id, 'id_room' => $room->id]),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }));

        $iSpermission = PermissionService::userHasPermission(Auth::user()->id);

        return view('room.room', compact('rooms', 'site', 'iSpermission', 'roomsJson'));
    }

    public function add_room($id_site, $id_room)
    {
        $room = Room::where('id', $id_room)->first();
        $site = Site::where('id', $id_site)->first();

        return view('room.add_room', compact('room', 'site'));
    }

    public function save_room(CreateRoomForm $request)
    {
        //dd($request->all());

        if($request->input('request-type') != "edit")
        {
            Room::create([
                'name' => $request->input('room-name'),
                'description' => $request->input('room-description'),
                'site_id' => $request->input('id_site'),
            ]);

            //Notification
            $url = route('app_room', ['id_site' => $request->input('id_site')]);
            $description = "dashboard.added_a_room";
            NotificationRepo::setNotification($description, $url);
        }
        else
        {
            Room::where('id', $request->input('id'))
                ->update([
                    'name' => $request->input('room-name'),
                    'description' => $request->input('room-description'),
                    'updated_at' => new \DateTimeImmutable,
            ]);

            //Notification
            $url = route('app_add_room', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id')]);
            $description = "dashboard.has_modified_a_room";
            NotificationRepo::setNotification($description, $url);
        }

        return redirect()->route('app_room', ['id_site' => $request->input('id_site')])->with('success', __('dashboard.data_saved_successfully'));
    }

    public function delete_room(Request $request)
    {

        $room = Room::where('id', $request->input('id_element'))->first();
        $site = Site::where('id', $room->site_id)->first();

        Room::where('id', $request->input('id_element'))->delete();

        //Notification
        $url = route('app_room', ['id_site' => $site->id]);
        $description = "dashboard.has_deleted_a_room";
        NotificationRepo::setNotification($description, $url);

        return redirect()->route('app_room', ['id_site' => $site->id])->with('success', __('dashboard.data_deleted_successfully'));
    }
}
