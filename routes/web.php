<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LabelsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostsPublicController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Routing\ResponseFactory;



Route::get('/', function () {
    return view('admins.index');
});

Route::get('/dashboard', [PostsPublicController::class, 'index']);


Route::resource('/categories', CategoriesController::class);
Route::get('/categories/create', [CategoriesController::class, 'users']);

Route::resource('/posts', PostsController::class);

Route::resource('/labels', LabelsController::class);

Route::resource('/users', UsersController::class);

Route::resource('/authors', AuthorsController::class);

Route::resource('/roles', RolesController::class);


Route::get('/feed', function (ResponseFactory $responseFactory) {
    // Obtener los datos que deseas incluir en el feed (por ejemplo, desde una base de datos)
    $items = App\Models\PostsModel::latest()->take(10)->get();

    // Inicializar una cadena para almacenar el XML del feed
    $feed = '<?xml version="1.0" encoding="UTF-8"?>';
    $feed .= '<rss version="2.0">';
    $feed .= '<channel>';
    $feed .= '<title>My Feed</title>';
    $feed .= '<link>' . url('/') . '</link>';
    $feed .= '<description>This is the RSS feed for My Website.</description>';

    // Agregar cada elemento al feed
    foreach ($items as $item) {
        $feed .= '<item>';
        $feed .= '<title>' . $item->title . '</title>';
        $feed .= '<link>' . $item->url . '</link>';
        $feed .= '<description>' . $item->description . '</description>';
        $feed .= '<pubDate>' . $item->created_at->toRfc2822String() . '</pubDate>';
        $feed .= '</item>';
    }

    $feed .= '</channel>';
    $feed .= '</rss>';

    // Devolver el feed como una respuesta HTTP con el tipo de contenido correcto
    return $responseFactory->make($feed, 200, ['Content-Type' => 'application/xml']);
});