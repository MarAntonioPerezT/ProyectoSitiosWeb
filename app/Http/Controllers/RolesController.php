<?php

namespace App\Http\Controllers;

use App\Models\RolesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $roles = DB::SELECT('SELECT * FROM roles_models r WHERE r.estado = 1 ORDER BY r.id DESC;');
        return view('admins.roles.index', array('roles' => $roles));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.roles.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = RolesModel::where('NombreRol', $request['NombreRol'])->first();
        if ($rol) {
            // Si el rol existe, actualizar el estado a true
            $rol->Estado = 1;
            $rol->save();
    
            // Mensaje de actualización
            return redirect('roles')->with('Mensaje', 'Estado del rol actualizado a true');
        }

        $roles = new RolesModel();
        $roles->NombreRol = $request['NombreRol'];
        $roles->Descripcion = $request['Descripcion'];
        $roles->FechaCreacion = date("Y-m-d H:i:s");
        $roles->Estado = 1;
        $roles->save();
        
        return redirect('roles')->with('Mensaje', 'Nuevo rol agregado');
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
        $roles = RolesModel::findOrFail($id);
        return view('admins.roles.edit', array('roles' => $roles));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = RolesModel::findOrFail($id);
        $roles->NombreRol = $request['NombreRol'];
        $roles->Descripcion = $request['Descripcion'];
        $roles->save();
        return redirect('roles')->with('Mensaje', 'Rol actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles = RolesModel::findOrFail($id);
        $roles->Estado = 0;
        $roles->save();
        return redirect('roles')->with('Mensaje', 'Rol eliminado');
    }
}
