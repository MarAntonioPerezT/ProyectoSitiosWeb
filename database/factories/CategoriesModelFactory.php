<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoriesModel>
 */
class CategoriesModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NombreCategoria' => $this->faker->word,
            'Descripcion' => $this->faker->sentence,
            'FechaCreacion' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'),
            'estado' => 1,
            'user_id' => $this->faker->randomDigitNot(0),
        ];
    }
}
