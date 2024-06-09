<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admins.index');
});


Route::get('/home', function () {
    return view('admins.index');
});

Route::resource('/categories', CategoriesController::class);
Route::get('/categories/create', [CategoriesController::class, 'users']);

Route::get('/posts', function () {
    return view('admins.posts.index');
});

Route::get('/labels', function () {
    return view('admins.labels.index');
});

Route::get('/users', function () {
    return view('admins.users.index');
});

Route::get('/authors', function () {
    return view('admins.authors.index');
});

Route::get('/roles', function () {
    return view('admins.roles.index');
});

