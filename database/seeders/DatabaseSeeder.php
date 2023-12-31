<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\Employe;
use App\Models\Actualite;
use App\Models\Activite;
use App\Models\Forfait;
use Illuminate\Database\Seeder;
use App\Models\Role;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Ajout des rôles
        Role::factory()->create([
            "nom" => "Administrateur",
        ]);

        Role::factory()->create([
            "nom" => "Employé",
        ]);

        // Ajout d'un administrateur
        Employe::factory()->create([
            "prenom" => "Éric",
            "nom" => "Gagné",
            "identifiant" => "1234567",
            "password" => "$2y$10$8XVDG3VFfQJWJJDCglk0d.miBi6sugcbVKEdfOxsSCFik01bccrdy",
            "role_id" => 1
        ]);

        // Ajout d'un employé
        Employe::factory()->create([
            "prenom" => "Marie",
            "nom" => "Bertrand",
            "identifiant" => "1234568",
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            "role_id" => 2
        ]);

        // Ajout d'utilisateurs fictifs
        \App\Models\User::factory(250)->create();

        // Ajout d'employés fictifs
        \App\Models\Employe::factory(25)->create();


        // Ajout des activites (préexistants, dans un fichier /storage/app/data)
        $activites = json_decode(
            file_get_contents(storage_path("app/data/activites.json"))
        );

        foreach ($activites as $activite) {
            Activite::factory()->create([
                "titre" => $activite->titre,
                "image" => $activite->image,
                "endroit" => $activite->endroit,
                "description" => $activite->description,
            ]);
        }


        // Ajout des actualités (préexistants, dans un fichier /storage/app/data)
        $actualites = json_decode(
            file_get_contents(storage_path("app/data/actualites.json"))
        );

        foreach ($actualites as $actualite) {
            Actualite::factory()->create([
                "titre" => $actualite->titre,
                "image" => $actualite->image,
                "description" => $actualite->description,
            ]);
        }

        // Ajout des forfaits (préexistants, dans un fichier /storage/app/data)
        $forfaits = json_decode(
            file_get_contents(storage_path("app/data/forfaits.json"))
        );

        foreach ($forfaits as $forfait) {
            Forfait::factory()->create([
                "titre" => $forfait->titre,
                "description" => $forfait->description,
                "prix" => $forfait->prix,
                "date_arrive" => $forfait->date_arrive,
                "date_depart" => $forfait->date_depart,
            ]);
        }

        // Ajout de réservations fictives
        \App\Models\Reservation::factory(50)->create();
    }
}
