<?php

namespace Database\Factories;

use App\Enums\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name,
            'telephone' => $this->faker->unique()->phoneNumber,
            'whatsapp' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'sexe' => $this->faker->randomElement(['M', 'F']),
            'role' => Role::User->value,
            'password' => Hash::make('password'), 
            'profession' => $this->faker->jobTitle,
            'terms' => true,
            'remember_token' => null,
        ];
    }
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}