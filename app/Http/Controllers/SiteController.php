<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSiteForm;
use App\Models\Boite;
use App\Models\Document;
use App\Models\Room;
use App\Models\Site;
use App\Services\NotificationRepo;
use App\Services\PermissionService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

class SiteController extends Controller
{
    //
    public function site()
    {
        $sites = Site::paginate(6);
        $sitesJ = Site::all();
        $sitesJson = Js::from($sitesJ->map(function ($site) {
            return [
                'id' => $site->id,
                'name' => $site->name,
                'address' => $site->address,
                'url' => route('app_room', ['id_site' => $site->id]),
                // Ajoutez d'autres propriétés si nécessaire
            ];
        }));

        $sitesCount = Site::count();
        $roomsCount = Room::count();
        $boxesCount = Boite::count();
        $documentsCount = Document::count();

        $notifsAll = null;


        $notifsAll = DB::table('notifications')
                    ->join('read_notifs', 'read_notifs.id_notif', '=', 'notifications.id')
                    ->where('read_notifs.id_user', Auth::user()->id)
                    ->take(4)
                    ->orderBy('read_notifs.id', 'desc')
                    ->get();


        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $sitesThisMonth = Site::whereMonth('created_at', $currentMonth)
                            ->whereYear('created_at', $currentYear)
                            ->count();

        $roomsThisMonth = Room::whereMonth('created_at', $currentMonth)
                            ->whereYear('created_at', $currentYear)
                            ->count();

        $boxesThisMonth = Boite::whereMonth('created_at', $currentMonth)
                            ->whereYear('created_at', $currentYear)
                            ->count();

        $documentsThisMonth = Document::whereMonth('created_at', $currentMonth)
                            ->whereYear('created_at', $currentYear)
                            ->count();

        $iSpermission = PermissionService::userHasPermission(Auth::user()->id);

        $documentCounts = DB::table('sites')
                            ->leftJoin('rooms', 'rooms.site_id', '=', 'sites.id')
                            ->leftJoin('armoires', 'armoires.room_id', '=', 'rooms.id')
                            ->leftJoin('etageres', 'etageres.armoire_id', '=', 'armoires.id')
                            ->leftJoin('boites', 'boites.etagere_id', '=', 'etageres.id')
                            ->leftJoin('classeurs', 'classeurs.boite_id', '=', 'boites.id')
                            ->leftJoin('chemises', 'chemises.classeur_id', '=', 'classeurs.id')
                            ->leftJoin('documents', 'documents.chemise_id', '=', 'chemises.id')
                            ->select('sites.id', DB::raw('COUNT(documents.id) as document_count'))
                            ->groupBy('sites.id')
                            ->pluck('document_count', 'sites.id');

        $sitesApex = Site::all()->map(function ($site) use ($documentCounts) {
            return [
                'id' => $site->id,
                'name' => $site->name,
                'address' => $site->address,
                'document_count' => $documentCounts[$site->id] ?? 0,
            ];
        });

        $sitesJsonApex = Js::from($sitesApex);


        return view('site.site', compact(
            'sites',
            'sitesJson',
            'notifsAll',
            'sitesThisMonth',
            'roomsThisMonth',
            'sitesCount',
            'roomsCount',
            'iSpermission',
            'boxesCount',
            'boxesThisMonth',
            'documentsCount',
            'documentsThisMonth',
            'sitesJsonApex'
        ));
    }

    public function add_site($id)
    {
        $site = Site::where('id', $id)->first();

        $iSpermission = PermissionService::userHasPermission(Auth::user()->id);

        return view('site.add_site', compact('site', 'iSpermission'));
    }

    public function save_site(CreateSiteForm $request)
    {
        //dd($request->all());

        if($request->input('request-type') != "edit")
        {
            Site::create([
                'name' => $request->input('site-name'),
                'address' => $request->input('site-address'),
            ]);

            //Notification
            $url = route('app_site');
            $description = "dashboard.added_a_site";
            NotificationRepo::setNotification($description, $url);
        }
        else
        {
            Site::where('id', $request->input('id'))
                ->update([
                    'name' => $request->input('site-name'),
                    'address' => $request->input('site-address'),
                    'updated_at' => new \DateTimeImmutable,
            ]);

            //Notification
            $url = route('app_add_site', ['id' => $request->input('id')]);
            $description = "dashboard.has_modified_a_site";
            NotificationRepo::setNotification($description, $url);
        }

        return redirect()->route('app_site')->with('success', __('dashboard.data_saved_successfully'));
    }

    public function delete_site(Request $request)
    {
        Site::where('id', $request->input('id_element'))->delete();

        //Notification
        $url = route('app_site');
        $description = "dashboard.has_deleted_a_site";
        NotificationRepo::setNotification($description, $url);

        return redirect()->route('app_site')->with('success', __('dashboard.data_deleted_successfully'));
    }
}
