<?php

namespace App\Http\Controllers;

use App\Models\AuthorsModel;
use App\Models\RolesModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = DB::SELECT('SELECT * FROM authors_models a WHERE a.estado = 1 ORDER BY a.id DESC;');
        return view('admins.authors.index', array('authors' => $authors));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.authors.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = RolesModel::where('NombreRol', 'Autor')->first();
        if ($rol) {
            $rol_id = $rol->id;
        }
        $users = new UsersModel();

        $users->NombreUsuario = $request['NombreAutor'];
        $users->ApellidoUsuario = $request['ApellidoAutor'];
        $users->Email = $request['Email'];
        $users->Password = $request['Phone'];
        $users->Estado = 1;
        $users->rol_id = $rol_id;
        $users->save();

        $author = AuthorsModel::where('NombreAutor', $request['NombreAutor'])->first();
        if ($author) {
            // Si el autor existe, actualizar el estado a true
            $author->Estado = 1;
            $author->save();

            // Mensaje de actualización
            return redirect('authors')->with('Mensaje', 'Estado del autor actualizado a true');
        }

        $authors = new AuthorsModel();
        $authors->NombreAutor = $request['NombreAutor'];
        $authors->ApellidoAutor = $request['ApellidoAutor'];
        $authors->Email = $request['Email'];
        $authors->Phone = $request['Phone'];
        $authors->user_id = $users->id;
        $authors->Estado = 1;
        $authors->save();


        return redirect('authors')->with('Mensaje', 'Nuevo autor agregado');
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
        $authors = AuthorsModel::findOrFail($id);
        return view('admins.authors.edit', array('authors' => $authors));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $authors = AuthorsModel::findOrFail($id);
        $authors->NombreAutor = $request['NombreAutor'];
        $authors->ApellidoAutor = $request['ApellidoAutor'];
        $authors->Email = $request['Email'];
        $authors->Phone = $request['Phone'];
        $authors->save();
        return redirect('authors')->with('Mensaje', 'Autor actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $authors = AuthorsModel::findOrFail($id);

        $users = UsersModel::where('id', $authors->user_id)->first();
        if ($users) {
            $users->Estado = 0;
            $users->save();
        }

        $authors->Estado = 0;
        $authors->save();
        return redirect('authors')->with('Mensaje', 'Autor eliminado');
    }
}
