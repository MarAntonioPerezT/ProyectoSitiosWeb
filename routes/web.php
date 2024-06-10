<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
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

Route::resource('/users', UsersController::class);

Route::get('/authors', function () {
    return view('admins.authors.index');
});

Route::resource('/roles', RolesController::class);


