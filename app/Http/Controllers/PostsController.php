<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use App\Models\LabelsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PostsModel;
use App\Models\UsersModel;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = DB::SELECT('SELECT p.*, L.NombreEtiqueta, c.NombreCategoria
        FROM posts_models p INNER JOIN categories_models c ON p.categories_id = c.id INNER JOIN labels_models L on p.label_id = L.id
        WHERE p.Estado = 1 ORDER BY p.id DESC;');
        return view('admins.posts.index', array('posts' => $posts));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = DB::select('SELECT p.*, c.id as category_id, c.NombreCategoria, l.id as label_id, l.NombreEtiqueta 
                FROM posts_models p 
                INNER JOIN categories_models c ON p.categories_id = c.id 
                INNER JOIN labels_models l ON p.label_id = l.id 
                WHERE p.Estado = 1');
        return view('admins.posts.add', array('posts' => $posts));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $posts = new PostsModel();
        $posts->TituloEntrada = $request["TituloEntrada"];
        $posts->PostContenido = $request["PostContenido"];

        $image = $request->file('PostImagen');
        $destinationPath = 'img/imgPages/';
        $fileName = $image->getClientOriginalName();
        $saveImage = $request->file('PostImagen')->move($destinationPath, $fileName);

        $posts->PostImagen = $destinationPath . $fileName;
        $posts->FecPublicacion = date("Y-m-d H:i:s");
        $posts->Fec_creacion = date("Y-m-d H:i:s");
        $posts->Estado = true;
        $posts->label_id = $request["label_id"];
        $posts->categories_id = $request["categories_id"];
        $posts->save();
        return redirect('posts')->with('Mensaje', 'Nuevo registro');
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
        $posts = PostsModel::findOrFail($id);
        $labels = LabelsModel::where('estado', 1)->get();
        $categories = CategoriesModel::where('estado', 1)->get();

        return view('admins.posts.edit', compact('posts', 'labels', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = PostsModel::findOrFail($id);
        $post->TituloEntrada = $request->input("TituloEntrada");
        $post->PostContenido = $request->input("PostContenido");

        if ($request->hasFile('PostImagen')) {
            $image = $request->file('PostImagen');
            $destinationPath = 'img/imgPages/';
            $fileName = $image->getClientOriginalName();
            $saveImage = $request->file('PostImagen')->move($destinationPath, $fileName);
            $post->PostImagen = $destinationPath . $fileName;
        }

        $post->FecPublicacion = date("Y-m-d H:i:s");
        $post->Fec_creacion = date("Y-m-d H:i:s");
        $post->label_id = $request->input("label_id");
        $post->categories_id = $request->input("categories_id");
        $post->save();

        return redirect('posts')->with('Mensaje', 'Post actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = PostsModel::findOrFail($id);
        $posts->estado = false;
        $posts->save();
        return redirect('posts')->with('Mensaje', 'Post eliminado');
    }
}
