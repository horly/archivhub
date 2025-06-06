<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBoiteForm;
use App\Models\Boite;
use App\Models\Etagere;
use App\Models\Room;
use App\Models\Site;
use App\Services\NotificationRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class BoiteController extends Controller
{
    //
    public function boite($id_site, $id_room)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        $boites = Boite::select('boites.*')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->paginate(8);

        $boitesJ = Boite::select('boites.*')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->get();

        $boitesJson = Js::from($boitesJ->map(function ($boite) use ($site, $room) {
            return [
                'id' => $boite->id,
                'numero' => $boite->numero,
                'description' => $boite->description,
                'url' => route('app_add_boite', ['id_site' => $site->id, 'id_room' => $room->id, 'id_boite' => $boite->id]),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }));

        return view('boite.boite', compact('site', 'room', 'boites', 'boitesJson'));
    }

    public function add_boite($id_site, $id_room, $id_boite)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();
        $etageres = Etagere::select('etageres.*')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->get();

        $boite = Boite::where('id', $id_boite)->first();

        return view('boite.add_boite', compact('site', 'room', 'boite', 'etageres'));
    }

    public function save_boite(CreateBoiteForm $request)
    {
        if($request->input('request-type') != "edit")
        {
            Boite::create([
                'numero' => $request->input('boite-number'),
                'description' => $request->input('boite-description'),
                'etagere_id' => $request->input('boite-etagere'),
            ]);

            //Notification
            $url = route('app_boite', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.added_a_box";
            NotificationRepo::setNotification($description, $url);
        }
        else
        {
            Boite::where('id', $request->input('id'))
                ->update([
                    'numero' => $request->input('boite-number'),
                    'description' => $request->input('boite-description'),
                    'etagere_id' => $request->input('boite-etagere'),
                    'updated_at' => new \DateTimeImmutable,
            ]);

            //Notification
            $url = route('app_boite', ['id_site' => $request->input('id_site'), 'id_room' => $request->input('id_room')]);
            $description = "dashboard.updated_a_box";
            NotificationRepo::setNotification($description, $url);
        }

        return redirect()->route('app_boite', [
            'id_site' => $request->input('id_site'),
            'id_room' => $request->input('id_room')])->with('success', __('dashboard.data_saved_successfully'));
    }

    public function delete_boite(Request $request)
    {
        $boite = Boite::where('id', $request->input('id_element'))->first();
        $etagere = Etagere::where('id', $boite->etagere_id)->first();
        $room = Room::where('id', $etagere->armoire->room_id)->first();
        $site = Site::where('id', $room->site_id)->first();

        Boite::where('id', $request->input('id_element'))->delete();

        //Notification
        $url = route('app_boite', ['id_site' => $site->id, 'id_room' => $room->id]);
        $description = "dashboard.has_deleted_a_box";
        NotificationRepo::setNotification($description, $url);

        return redirect($url)->with('success', __('dashboard.data_deleted_successfully'));
    }
}
