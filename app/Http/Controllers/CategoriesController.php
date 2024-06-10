<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriesModel;
use App\Models\UsersModel;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::SELECT("SELECT c.*, u.NombreUsuario, u.ApellidoUsuario
        FROM categories_models c INNER JOIN users_models u on c.user_id = u.id
        WHERE c.estado = 1;");
        return view('admins.categories.index', array('categories' => $categories));


    }

    public function users()
    {
        $users = DB::SELECT("SELECT u.id, u.NombreUsuario, u.ApellidoUsuario
        FROM users_models u WHERE u.estado = 1;");
        return view('admins.categories.AddCatModel', array('users' => $users));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.categories.AddCatModel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = new CategoriesModel();
        $categories->NombreCategoria = $request['NombreCategoria'];
        $categories->Descripcion = $request['Descripcion'];
        $categories->FechaCreacion = date("Y-m-d H:i:s");
        $categories->estado = 1;
        $categories->user_id = $request['user_id'];
        $categories->save();
        return redirect('categories')->with('Mensaje', 'Nuevo categoria agregada');
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
        $categories = CategoriesModel::findOrFail($id);
        $user = UsersModel::findOrFail($categories->user_id);
        return view('admins.categories.EditCatModel', compact('categories', 'user'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $categories = CategoriesModel::findOrFail($id);
        $categories->NombreCategoria = $request['NombreCategoria'];
        $categories->Descripcion = $request['Descripcion'];
        $categories->save();
        return redirect('categories')->with('Mensaje', 'Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $categories = CategoriesModel::findOrFail($id);
        $categories->estado = false;
        $categories->save();
        return redirect('categories')->with('Mensaje', 'Categoria eliminada');
    }
}
