<?php

namespace App\Http\Controllers;

use App\Models\PostsModel;
use Illuminate\Http\Request;

class PostsPublicController extends Controller
{
    public function index()
    {
        $posts = PostsModel::with('categories', 'labels')->orderBy('id', 'desc')->paginate(9);
        return view('public.index', compact('posts'));
    }
}
