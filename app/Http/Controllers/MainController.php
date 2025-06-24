<?php

namespace App\Http\Controllers;

use App\Models\Armoire;
use App\Models\Chemise;
use App\Models\Classeur;
use App\Models\Document;
use App\Models\Notification;
use App\Models\ReadNotif;
use App\Models\Room;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function dashboard($id_site, $id_room)
    {
        $site = Site::where('id', $id_site)->first();
        $room = Room::where('id', $id_room)->first();

        $armoiresCount = Armoire::where('room_id', $room->id)->count();
        $classeursCount = Classeur::select('classeurs.*')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->count();
        $chemisesCount = Chemise::select('chemises.*')
                    ->join('classeurs', 'classeurs.id', '=', 'chemises.classeur_id')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->count();
        $documentsCount = Document::select('documents.*')
                    ->join('chemises', 'chemises.id', '=', 'documents.chemise_id')
                    ->join('classeurs', 'classeurs.id', '=', 'chemises.classeur_id')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->orderBy('documents.id', 'desc')
                    ->count();

        $documentsArchivCount = Document::select('documents.*')
                    ->join('chemises', 'chemises.id', '=', 'documents.chemise_id')
                    ->join('classeurs', 'classeurs.id', '=', 'chemises.classeur_id')
                    ->join('boites', 'boites.id', '=', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', '=', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', '=', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->whereNotNull('documents.lien_numerisation') // Correction ici
                    ->count();

        $documentsNonArchivCount = Document::join('chemises', 'chemises.id', 'documents.chemise_id')
                    ->join('classeurs', 'classeurs.id', 'chemises.classeur_id')
                    ->join('boites', 'boites.id', 'classeurs.boite_id')
                    ->join('etageres', 'etageres.id', 'boites.etagere_id')
                    ->join('armoires', 'armoires.id', 'etageres.armoire_id')
                    ->where('armoires.room_id', $id_room)
                    ->whereNull('documents.lien_numerisation')
                    ->count();

        // Calcul du total
        $total = $documentsArchivCount + $documentsNonArchivCount;

        // Calcul des pourcentages (décimal entre 0 et 1)
        $archivPercentage = $total > 0 ? $documentsArchivCount / $total : 0;
        $nonArchivPercentage = $total > 0 ? $documentsNonArchivCount / $total : 0;

        $archived = number_format($archivPercentage * 100, 1, '.', ' ');
        $draft = number_format($nonArchivPercentage * 100, 1, '.', ' ');

        return view('main.dashboard', compact(
            'site',
            'room',
            'armoiresCount',
            'classeursCount',
            'chemisesCount',
            'documentsCount',
            'documentsArchivCount',
            'documentsNonArchivCount',
            'archived',
            'draft'));
    }

    public function read_notification(Request $request)
    {
        $id = $request->input('id_element');

        $readNotif = ReadNotif::where('id', $id)->first();
        $notification = Notification::where('id', $readNotif->id_notif)->first();
        $hostwithHttp = request()->getSchemeAndHttpHost();

        $route = $hostwithHttp . $notification->link;

        ReadNotif::where('id', $id)
                ->update([
                    'read' => 1
                ]);

        return redirect()->back();
    }

    public function all_notification()
    {
        $notifsAll = null;

        $notifsAll = DB::table('notifications')
                    ->join('read_notifs', 'read_notifs.id_notif', '=', 'notifications.id')
                    ->where('read_notifs.id_user', Auth::user()->id)
                    ->orderBy('read_notifs.id', 'desc')
                    ->paginate(5);

        return view('main.all-notification', compact('notifsAll'));
    }

    public function unviewed_notifications()
    {
        $notifsAll = null;

        $notifsAll = DB::table('notifications')
                    ->join('read_notifs', 'read_notifs.id_notif', '=', 'notifications.id')
                    ->where([
                        'read_notifs.id_user' => Auth::user()->id,
                        'read_notifs.read'=> 0,
                    ])
                    ->orderBy('read_notifs.id', 'desc')
                    ->paginate(5);

        return view('main.unviewed-notifications', compact('notifsAll'));
    }
}
