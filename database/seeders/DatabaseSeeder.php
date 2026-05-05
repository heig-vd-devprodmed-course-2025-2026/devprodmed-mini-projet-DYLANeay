<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            // ---------------------------------------------------------------
            // USERS
            //  1 -> John   : auteur du post signalé
            //  2 -> Jane   : utilisatrice qui signale
            //  3 -> Admin  : modère depuis /admin/reports
            // ---------------------------------------------------------------
            DB::table("users")->insert([
                [
                    "id" => 1,
                    "first_name" => "John",
                    "last_name" => "Doe",
                    "username" => "johndoe",
                    "email" => "john.doe@example.com",
                    "password" => Hash::make("password"),
                    "is_admin" => false,
                    "created_at" => new \DateTime("2026-02-09 10:00:00"),
                    "updated_at" => new \DateTime("2026-02-09 10:00:00"),
                ],
                [
                    "id" => 2,
                    "first_name" => "Jane",
                    "last_name" => "Doe",
                    "username" => "janedoe",
                    "email" => "jane.doe@example.com",
                    "password" => Hash::make("password"),
                    "is_admin" => false,
                    "created_at" => new \DateTime("2026-02-09 11:00:00"),
                    "updated_at" => new \DateTime("2026-02-09 11:00:00"),
                ],
                [
                    "id" => 3,
                    "first_name" => "Admin",
                    "last_name" => "Admin",
                    "username" => "admin",
                    "email" => "admin@example.com",
                    "password" => Hash::make("password"),
                    "is_admin" => true,
                    "created_at" => new \DateTime("2026-02-09 10:30:00"),
                    "updated_at" => new \DateTime("2026-02-09 10:30:00"),
                ],
            ]);

            // ---------------------------------------------------------------
            // POSTS
            //  1 -> John, titre explicite, contenu spam -> cible du report
            //  2 -> John, sans titre, contenu neutre   -> aucun report
            //  3 -> Jane, titre explicite, contenu neutre -> aucun report
            // ---------------------------------------------------------------
            DB::table("posts")->insert([
                [
                    "id" => 1,
                    "user_id" => 1,
                    "title" => "Promo crypto à éviter",
                    "content" => "GAGNEZ 10000\$ EN 24H. Lien en bio, programme limité, dépêchez-vous avant fermeture.",
                    "created_at" => new \DateTime("2026-02-12 08:00:00"),
                    "updated_at" => new \DateTime("2026-02-12 08:00:00"),
                ],
                [
                    "id" => 2,
                    "user_id" => 1,
                    "title" => null,
                    "content" => "rien ne vaut un bon café et 200 lignes de Laravel un mardi matin",
                    "created_at" => new \DateTime("2026-02-11 10:15:00"),
                    "updated_at" => new \DateTime("2026-02-11 10:15:00"),
                ],
                [
                    "id" => 3,
                    "user_id" => 2,
                    "title" => "Recette tarte aux pommes",
                    "content" => "tarte aux pommes de mamie testée ce week-end. simple, rapide, redoutable. recette en commentaire",
                    "created_at" => new \DateTime("2026-02-14 14:00:00"),
                    "updated_at" => new \DateTime("2026-02-14 14:00:00"),
                ],
            ]);

            // ---------------------------------------------------------------
            // REPORTS
            //  Jane signale le post 1 -> visible dans /admin/reports
            // ---------------------------------------------------------------
            DB::table("reports")->insert([
                [
                    "post_id" => 1,
                    "user_id" => 2,
                    "reason" => "Spam ou publicité",
                    "status" => "pending",
                    "created_at" => new \DateTime("2026-02-12 08:30:00"),
                    "updated_at" => new \DateTime("2026-02-12 08:30:00"),
                ],
            ]);
        });
    }
}
