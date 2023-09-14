<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    /**
     * Affiche le formulaire de connexion
     *
     * @return View
     */
    public function create() {
        return view('auth.connexion.create');
    }

    /**
     * Traite la connexion d'un utilisateur
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function authentifier(Request $request) {

        // Validation
        $valides = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ], [
            "email.required" => "Le courriel est obligatoire",
            "email.email" => "Le courriel doit avoir un format valide",
            "password.required" => "Le mot de passe est requis"
        ]);

        // Ajouter l'utilisateur à la session
        if(Auth::attempt($valides)){
            $request->session()->regenerate();

            return redirect()
                    ->intended(route('utilisateurs.index'))
                    ->with('succes', 'Vous êtes connectés!');
        }

        // Redirection
        return back()
                ->withErrors([
                    "email" => "Les informations fournies ne sont pas valides"
                ])
                ->onlyInput('email');

    }

    /**
     * Traite la déconnexion de l'utilisateur
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function deconnecter(Request $request) {
        Auth::logout();

        // Enlever l'utilisateur de la session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirection
        return redirect()
                ->route('connexion.create')
                ->with('succes', "Vous êtes déconnectés!");

    }
}
