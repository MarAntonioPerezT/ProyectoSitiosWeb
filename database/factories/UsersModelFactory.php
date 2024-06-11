<?php

namespace Database\Factories;

use App\Http\Controllers\UsersController;
use App\Models\RolesModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsersModel>
 */
class UsersModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        
        return [
            'NombreUsuario' => $this->faker->name,
            'ApellidoUsuario' => $this->faker->lastName,
            'Email' => $this->faker->unique()->safeEmail,
            'Password' => $this->faker->password,
            'rol_id' => RolesModel::factory(),
            'Estado' => $this->faker->boolean,
        ];
    }
}
