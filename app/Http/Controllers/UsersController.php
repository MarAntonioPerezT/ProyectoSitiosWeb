<?php

namespace App\Http\Controllers;

use App\Models\RolesModel;
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
        $users = DB::SELECT('SELECT u.*, r.NombreRol
        FROM users_models u INNER JOIN roles_models r ON u.rol_id = r.id
        WHERE u.estado = 1;');
        return view('admins.users.index', array('users' => $users));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = DB::SELECT('SELECT * FROM roles_models r WHERE r.estado = 1;');
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

        $roles = RolesModel::findOrFail($request['rol_id']);

        if ($roles->NombreRol === 'Autor') {
            $authors = new AuthorsModel();
            $authors->NombreAutor = $request['NombreUsuario'];
            $authors->ApellidoAutor = $request['ApellidoUsuario'];
            $authors->Email = $request['Email'];
            $authors->Phone = $request['Password'];
            $authors->Estado = 1;
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
        $roles = RolesModel::where('Estado', 1)->get();
        return view('users', compact('users', 'roles'));
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
    public function destroy($id)
{
    $user = UsersModel::findOrFail($id);
    
    // Actualizar el estado del autor si existe
    $author = AuthorsModel::where('user_id', $user->id)->first();
    if ($author) {
        $author->Estado = 0;
        $author->save();  // Guardar los cambios en la base de datos
    }

    // Actualizar el estado del usuario
    $user->Estado = 0;
    $user->save();  // Guardar los cambios en la base de datos

    return redirect('users')->with('Mensaje', 'Usuario eliminado');
}

}
