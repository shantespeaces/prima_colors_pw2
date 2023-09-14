<?php

use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EnregistrementController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

/*ACCUEIL*/

/**PAGE ACTIVITÉS */
Route::get('/actualites', [ActualiteController::class, 'index'])
->name('activites.index');

/**PAGE ACTUALITÉS */
// Route::get('/actualites', [ActualiteController::class, 'index'])
// ->name('actiualites.index');

/** PAGE À PROPOS*/
/** PAGE BILLETERIE */
/**PAGE CONCOURS */







    // SECTION CONNEXION - CRÉATION COMPTE
// Affichage de la connexion d'un compte utilisateur
Route::get("/connexion", [ConnexionController::class, 'create'])
    ->name('connexion.create');
    // ->middleware('guest');

// Traitement du formulaire de connexion d'un compte utilisateur
Route::post("/connexion", [ConnexionController::class, 'authentifier'])
    ->name('connexion.authentifier');

// Affichage de l'enregistrement d'un nouveau compte utilisateur
Route::get("/enregistrement",[EnregistrementController::class, 'create'])
    ->name('enregistrement.create');

// Traitement du formulaire d'enregistrement d'un nouveau compte utilisateur
Route::post("/enregistrement", [EnregistrementController::class, 'store'])
    ->name('enregistrement.store');

// Déconnexion de du compte utilisateur
Route::post("/deconnexion", [ConnexionController::class, 'deconnecter'])
    ->name('deconnexion');

    // SECTION UTILISATEUR
// Affichage de la page utilisateur
Route::get('/utilisateurs', [UtilisateurController::class, 'index'])
    ->name('utilisateurs.index')
    ->middleware('auth');

// Traitement du formulaire d'ajout de la réservation
Route::post('/utilisateurs', [ReservationController::class, 'store'])
    ->name('reservations.store');

