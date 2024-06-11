<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RolesModel>
 */
class RolesModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NombreRol' => fake()->randomElement(['Admin', 'Usuario', 'Autor']), // Cambiado a randomElement
            'Descripcion' => fake()->sentence,
            'FechaCreacion' => fake()->date,
            'Estado' => fake()->boolean,
        ];
    }
}
