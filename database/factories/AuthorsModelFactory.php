<?php

namespace Database\Factories;

use App\Models\AuthorsModel;
use App\Models\User;
use App\Models\UsersModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuthorsModel>
 */
class AuthorsModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = AuthorsModel::class;
    public function definition(): array
    {
        $user = UsersModel::factory()->create();

        return [
            'NombreAutor' => $user->NombreUsuario,
            'ApellidoAutor' => $user->ApellidoUsuario,
            'Email' => $user->Email,
            'Phone' => $user->Password,
            'user_id' => $user->id,
            'Estado' => 1,
        ];
    }
}
