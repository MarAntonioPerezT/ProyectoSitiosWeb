<?php

namespace App\Http\Controllers;

use App\Models\LabelsModel;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = DB::SELECT('SELECT * FROM labels_models l WHERE l.estado = 1 ORDER BY l.id DESC;');
        return view('admins.labels.index', array('labels' => $labels));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.labels.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $labels = new LabelsModel();
        $labels->NombreEtiqueta = $request['NombreEtiqueta'];
        $labels->Descripcion = $request['Descripcion'];
        $labels->FechaCreacion = date("Y-m-d H:i:s");
        $labels->estado = 1;
        $labels->UsuarioCreador = $request['UsuarioCreador'];
        $labels->save();
        return redirect('labels')->with('Mensaje', 'Nueva etiqueta agregada');
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
        $labels = LabelsModel::findOrFail($id);
        return view('admins.labels.edit', array('labels' => $labels));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $labels = LabelsModel::findOrFail($id);
        $labels->NombreEtiqueta = $request['NombreEtiqueta'];
        $labels->Descripcion = $request['Descripcion'];
        $labels->save();
        return redirect('labels')->with('Mensaje', 'Etiqueta actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $labels = LabelsModel::findOrFail($id);
        $labels->estado = false;
        $labels->save();
        return redirect('labels')->with('Mensaje', 'Etiqueta eliminada');
    }
}
