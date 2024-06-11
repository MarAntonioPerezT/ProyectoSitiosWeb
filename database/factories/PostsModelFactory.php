<?php

namespace Database\Factories;

use App\Models\CategoriesModel;
use App\Models\LabelsModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostsModel>
 */
class PostsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'TituloEntrada' => $this->faker->sentence,
            'PostContenido' => $this->faker->paragraph,
            'PostImagen' => $this->faker->randomElement(['img/imgPages/post_img.webp', 'img/imgPages/users_img.webp', 'img/imgPages/categories_img.webp', 'img/imgPages/author_img.webp']),
            'FecPublicacion' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'),
            'Fec_creacion' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'),
            'Estado' => 1,
            'label_id' => LabelsModel::factory(),
            'categories_id' => CategoriesModel::factory(),
        ];
    }
}
