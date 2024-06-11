<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LabelsModel>
 */
class LabelsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NombreEtiqueta' => fake()->word(),
            'Descripcion' => fake()->sentence,
            'FechaCreacion' => fake()->date,
            'UsuarioCreador' => fake()->name,
            'Estado' => 1,
            
        ];
    }
}
