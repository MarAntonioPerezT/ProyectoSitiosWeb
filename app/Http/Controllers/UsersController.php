<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UsersModel;
use App\Models\AuthorsModel;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::SELECT('SELECT * FROM users_models u INNER JOIN roles_models r ON u.rol_id = r.id;');
        return view('admins.users.index', array('users' => $users));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = DB::SELECT('SELECT * FROM users_models u INNER JOIN roles_models r ON u.rol_id = r.id;');
        return view('admins.users.add', array('roles' => $roles));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users = new UsersModel();
        $users->NombreUsuario = $request['NombreUsuario'];
        $users->ApellidoUsuario = $request['ApellidoUsuario'];
        $users->Email = $request['Email'];
        $users->Estado = 1;
        $users->Password = $request['Password'];
        $users->rol_id = $request['rol_id'];
        $users->save();

        if ($users->rol->NombreAutor === 'Autor') {
            $authors = new AuthorsModel();
            $authors->NombreAutor = $request['NombreUsuario'];
            $authors->ApellidoAutor = $request['ApellidoUsuario'];
            $authors->Email = $request['Email'];
            $authors->Phone = $request['Password'];
            $authors->user_id = $users->id;
            $authors->save();
        }


        return redirect('users')->with('Mensaje', 'Nuevo usuario agregado');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = UsersModel::findOrFail($id);
        return view('admins.users.edit', array('users' => $users));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = UsersModel::findOrFail($id);
        $users->NombreUsuario = $request['NombreUsuario'];
        $users->ApellidoUsuario = $request['ApellidoUsuario'];
        $users->Email = $request['Email'];
        $users->Password = $request['Password'];
        $users->rol_id = $request['rol_id'];
        $users->save();
        return redirect('users')->with('Mensaje', 'Usuario actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = UsersModel::findOrFail($id);
        $authors = AuthorsModel::findOrFail($users->id);
        $authors->Estado = 0;
        $users->Estado = 0;
        return redirect('users')->with('Mensaje', 'Usuario eliminado');
    }
}
