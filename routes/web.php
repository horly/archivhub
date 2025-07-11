<?php

use App\Http\Controllers\ArmoireController;
use App\Http\Controllers\BoiteController;
use App\Http\Controllers\ChemiseController;
use App\Http\Controllers\ClasseurController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EtagereController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LicenceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        // Utilisateur connecté
        return redirect()->route('app_site');
    } else {
        // Invité
        return view('auth.login');
    }
});


/** Traduction route */
Route::get('/lang/{lang}',
    [LanguageController::class, 'switchLang'])
        ->name('app_language');

Route::controller(LicenceController::class)->group(function(){
    Route::get('/add_licence', 'add_licence')->name('app_add_licence');
    Route::get('/generate_license', 'generate_license')->name('app_generate_license');

    Route::post('/save_license', 'save_license')->name('app_save_license');
    Route::post('/create_licence', 'create_licence')->name('app_create_licence');
});


Route::controller(LoginController::class)->group(function(){
    Route::get('/logout', 'logout')->name('app_logout');
    Route::get('/register_user', 'register_user')->name('app_register_user');
    Route::get('/profile', 'profile')->name('app_profile');

    Route::post('/create_user', 'create_user')->name('app_create_user');
    Route::post('/create_user_admin', 'create_user_admin')->name('app_create_user_admin');

    Route::middleware(['auth', 'admin'])->group(function(){
        Route::get('/user_management', 'user_management')->name('app_user_management');
        Route::post('/save_permission', 'save_permission')->name('app_save_permission');
        Route::get('/add_user/{id:int}', 'add_user')->name('app_add_user');
        Route::post('/delete_user', 'delete_user')->name('app_delete_user');
    });
});

Route::controller(MainController::class)->group(function(){
    Route::middleware(['auth', 'check.license'])->group(function () {
        Route::match(['post', 'get'], '/read_notification', 'read_notification')->name('app_read_notification');
        Route::get('/all_notification', 'all_notification')->name('app_all_notification');
        Route::get('/unviewed_notifications', 'unviewed_notifications')->name('app_unviewed_notifications');
        Route::get('/dashboard/{id_site:int}/{id_room:int}', 'dashboard')->name('app_dashboard');
    });
});

Route::controller(SiteController::class)->group(function(){
    Route::middleware(['auth', 'check.license'])->group(function () {
        Route::get('/site', 'site')->name('app_site');
        Route::get('/add_site/{id:int}', 'add_site')->name('app_add_site');

        Route::post('/save_site', 'save_site')->name('app_save_site');
        Route::post('/delete_site', 'delete_site')->name('app_delete_site');
    });
});

Route::controller(RoomController::class)->group(function(){
    Route::middleware(['auth', 'check.license'])->group(function () {
        Route::get('/room/{id_site:int}', 'room')->name('app_room');
        Route::get('/add_room/{id_site:int}/{id_room:int}', 'add_room')->name('app_add_room');

        Route::post('/save_room', 'save_room')->name('app_save_room');
        Route::post('/delete_room', 'delete_room')->name('app_delete_room');
    });
});

Route::controller(ArmoireController::class)->group(function(){
    Route::middleware(['auth', 'check.license'])->group(function () {
        Route::get('/armoire/{id_site:int}/{id_room:int}', 'armoire')->name('app_armoire');
        Route::get('/add_armoire/{id_site:int}/{id_room:int}/{id_armoire:int}', 'add_armoire')->name('app_add_armoire');

        Route::post('/save_armoire', 'save_armoire')->name('app_save_armoire');
        Route::post('/delete_armoire', 'delete_armoire')->name('app_delete_armoire');

    });
});

Route::controller(EtagereController::class)->group(function(){
    Route::middleware(['auth', 'check.license'])->group(function () {
        Route::get('/etagere/{id_site:int}/{id_room:int}', 'etagere')->name('app_etagere');
        Route::get('/add_etagere/{id_site:int}/{id_room:int}/{id_etagere:int}', 'add_etagere')->name('app_add_etagere');

        Route::post('/save_etagere', 'save_etagere')->name('app_save_etagere');
        Route::post('/delete_etagere', 'delete_etagere')->name('app_delete_etagere');

    });
});

Route::controller(BoiteController::class)->group(function(){
    Route::middleware(['auth', 'check.license'])->group(function () {
        Route::get('/boite/{id_site:int}/{id_room:int}', 'boite')->name('app_boite');
        Route::get('/add_boite/{id_site:int}/{id_room:int}/{id_boite:int}', 'add_boite')->name('app_add_boite');

        Route::post('/save_boite', 'save_boite')->name('app_save_boite');
        Route::post('/delete_boite', 'delete_boite')->name('app_delete_boite');

    });
});

Route::controller(ClasseurController::class)->group(function(){
    Route::middleware(['auth', 'check.license'])->group(function () {
        Route::get('/classeur/{id_site:int}/{id_room:int}', 'classeur')->name('app_classeur');
        Route::get('/add_classeur/{id_site:int}/{id_room:int}/{id_classeur:int}', 'add_classeur')->name('app_add_classeur');

        Route::post('/save_classeur', 'save_classeur')->name('app_save_classeur');
        Route::post('/delete_classeur', 'delete_classeur')->name('app_delete_classeur');

    });
});

Route::controller(ChemiseController::class)->group(function(){
    Route::middleware(['auth', 'check.license'])->group(function () {
        Route::get('/chemise/{id_site:int}/{id_room:int}', 'chemise')->name('app_chemise');
        Route::get('/add_chemise/{id_site:int}/{id_room:int}/{id_chemise:int}', 'add_chemise')->name('app_add_chemise');

        Route::post('/save_chemise', 'save_chemise')->name('app_save_chemise');
        Route::post('/delete_chemise', 'delete_chemise')->name('app_delete_chemise');

    });
});

Route::controller(DocumentController::class)->group(function(){
    Route::middleware(['auth', 'check.license'])->group(function () {
        Route::get('/document/{id_site:int}/{id_room:int}', 'document')->name('app_document');
        Route::get('/add_document/{id_site:int}/{id_room:int}/{id_document:int}', 'add_document')->name('app_add_document');

        Route::post('/save_document', 'save_document')->name('app_save_document');
        Route::post('/delete_document', 'delete_document')->name('app_delete_document');
        Route::post('/upload_pdf_document', 'upload_pdf_document')->name('app_upload_pdf_document');
        Route::post('/set_doc_consultation', 'set_doc_consultation')->name('app_set_doc_consultation');
    });
});


