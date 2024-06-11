<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            ['NombreRol' => 'Admin', 'Descripcion' => 'Administrador del sistema', 'FechaCreacion' => Carbon::now(), 'Estado' => true],
            ['NombreRol' => 'Usuario', 'Descripcion' => 'Usuario regular', 'FechaCreacion' => Carbon::now(), 'Estado' => true],
            // Agrega más roles si es necesario
        ];

        DB::table('roles_models')->insert($roles);
    }
}
