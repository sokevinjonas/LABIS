<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activite>
 */
class ActiviteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $date_debut =  Carbon::now()->format('2024-03-15');
        $date_fin =  Carbon::now()->format('2024-03-17');
        return [
            'titre' => $this->faker->text(100),
            'description' => $this->faker->text(350),
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'etat' => $this->faker->randomElement(['active', 'inactive']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}