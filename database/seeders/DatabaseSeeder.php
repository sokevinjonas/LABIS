<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\ActiviteSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur standard
        User::factory()->create([
            'nom' => 'Bienvenue Jeune Labis',
            'email' => 'test@example.com',
            'telephone' => 56785580,
            'password' => Hash::make('123456'),
            'role' => Role::User->value,
        ]);

        // Créer un administrateur
        User::factory()->create([
            'nom' => 'Bienvenue Jeune Labis',
            'email' => 'admin@example.com',
            'telephone' => 52645634,
            'password' => Hash::make('123456'),
            'role' => Role::Admin->value,
        ]);

        // Appeler le seeder ActiviteSeeder
        $this->call([
            ActiviteSeeder::class
        ]);
    }
}