<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEtagereForm;
use App\Models\Armoire;
use App\Models\Etagere;
use App\Models\Room;
use App\Models\Site;
use App\Services\NotificationRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class EtagereController extends Controller
{
    //
    public function etagere($id_site, $id_room, Request $request)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        $etageres = Etagere::select('etageres.*')
                    ->join('armoires', 'armoires.id', '=', 'etageres.id_armoire')
                    ->where('armoires.id_room', $id_room)
                    ->paginate(8);

        $etageresJ = Etagere::select('etageres.*')
                    ->join('armoires', 'armoires.id', '=', 'etageres.id_armoire')
                    ->where('armoires.id_room', $id_room)
                    ->get();


        $etageresJson = Js::from($etageresJ->map(function ($etagere) use ($site, $room) {
            return [
                'id' => $etagere->id,
                'numero' => $etagere->numero,
                'description' => $etagere->description,
                'url' => route('app_add_etagere', ['id_site' => $site->id, 'id_room' => $room->id, 'id_armoire' => $etagere->armoire->id, 'id_etagere' => $etagere->id]),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }));

        return view('etagere.etagere', compact('site', 'room', 'etageres', 'etageresJson'));
    }

    public function add_etagere($id_site, $id_room, $id_etagere)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();
        $armoires = Armoire::where('id_room', $room->id)->get();
        $etagere = Etagere::where('id', $id_etagere)->first();

        return view('etagere.add_etagere', compact('site', 'room', 'etagere', 'armoires'));
    }


    public function save_etagere(CreateEtagereForm $request)
    {
        if($request->input('request-type') != "edit")
        {
            Etagere::create([
                'numero' => $request->input('etagere-number'),
                'description' => $request->input('etagere-description'),
                'id_armoire' => $request->input('etagere-armoire'),
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
                    'id_armoire' => $request->input('etagere-armoire'),
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
        $room = Room::where('id', $etagere->armoire->id_room)->first();
        $site = Site::where('id', $room->site_id)->first();

        Etagere::where('id', $request->input('id_element'))->delete();

        //Notification
        $url = route('app_etagere', ['id_site' => $site->id, 'id_room' => $room->id]);
        $description = "dashboard.has_deleted_a_shelve";
        NotificationRepo::setNotification($description, $url);

        return redirect($url)->with('success', __('dashboard.data_deleted_successfully'));
    }
}
