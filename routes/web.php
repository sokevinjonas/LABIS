<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\AuthenficationController;
use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\LogoutUserController;
use App\Http\Controllers\Presence\ListePresencController;
use App\Http\Controllers\Activites\ActiviteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//lorsque je ne suis pas connecter voici les pages dont j'ai access
Route::group(['middleware' => 'guest'], function ()
{
        //cette routes retourne la vue du formulaire d'inscription
    Route::get('form-register', [AuthenficationController::class, 'register'])
            ->name('register');
        //cette routes traite la vue du formulaire d'inscription
    Route::post('post-form-register', [AuthenficationController::class, 'PostRegister'])
            ->name('Postregister');
        //cette routes retourne la vue du formulaire de connexion
    Route::get('form-sign', [AuthenficationController::class, 'sign'])
            ->name('sign');
        //cette routes traite la vue du formulaire de connexion
    Route::post('post-form-sign', [AuthenficationController::class, 'PostSign'])
            ->name('Postsign');
});

//lorsque je suis connecter
Route::group(['middleware' => 'auth'], function ()
{
        //cette routes retourne la vue du la page acceuil dashboard
    Route::get('/', [AdminController::class, 'dashboard'])
            ->name('dashboard');
        //cette routes affiche les listes de tous les users cote administrator
    Route::get('/liste-of-users-admin', [AdminController::class, 'listOfUser'])
            ->name('listeUser');
       //cette routes affiche les listes de toutes les presences cote administrator
    Route::get('/liste-of-presence-admin', [AdminController::class, 'listOPresence'])
            ->name('listePresenceAdmin');
        //cette route traite le formulaire pour enregistrer une presence en tant que simple users
    Route::post('/prences-du-jour', [PresenceController::class, 'EnregistrePresence'])
            ->name('presence');
        //cette route affiche tous les enregistrement  d'une presence en tant que simple users
    Route::get('mes-presences', ListePresencController::class)
            ->name('mespresences');
        //cette route traite le formulaire de creation dun new user  en tant que administrateur
    Route::post('create-utilisateur', CreateUserController::class)
            ->name('createUser');
        //cette route affiche la page mon profile que ca soit admin ou users
    Route::get('my-profile' , [ProfileController::class, 'AffichageProfile'])
            ->name('myProfile');
        //cette route permet de mettre a jour les infos du profiles (nom, sexe, prof, bio, email, tel, whatsapp)
    Route::post('update-profile' , [ProfileController::class, 'UpdateUserProfile'])
            ->name('post_user_profile');
        //cette route permet de mettre a jour la photo du profile
    Route::post('update-photo' , [ProfileController::class, 'UpdatePhoto'])
            ->name('update_user_photo');
        //cette route permet de deconnecter un utilisateurs(admin ou pas admin)
    Route::get('logout-user', [ProfileController::class, 'Logout'])
            ->name('logoutUser');

    Route::get('change-password', [ProfileController::class, 'changePassword'])
            ->name('changePassword');

    Route::get('/cherche/presence', [AdminController::class, 'SearchPresence'])->name('search.presence');
    Route::get('/filter/presence', [AdminController::class, 'FilterPresence'])->name('filter.presence');

    Route::get('/cherche/user', [AdminController::class, 'SearchUser'])->name('search.user');
    Route::get('/filter/user', [AdminController::class, 'FilterUser'])->name('filter.user');

    Route::get('/delete/{id}', [AdminController::class, 'DeleteUser'])->name('delete.user');

    // activité créé par ardmin
    Route::get('liste/activites', [ActiviteController::class, 'activiteListe'])->name('liste_activite');
    Route::get('create/activite', [ActiviteController::class, 'activiteCreate'])->name('create_activite');

    Route::get('publier/activite/{id}', [ActiviteController::class, 'publierActivite'])->name('publier_activite');
    Route::get('retirer/activite/{id}', [ActiviteController::class, 'retirerActivite'])->name('retirer_activite');

    Route::post('store/activite', [ActiviteController::class, 'storeActivite'])->name('store_activite');







});


