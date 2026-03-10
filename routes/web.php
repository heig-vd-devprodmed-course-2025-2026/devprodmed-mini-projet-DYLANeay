<?php

use App\Models\Post;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'desc')->with('user')->with('likes')->get();

    return view('home', ['posts' => $posts]);
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/@{username}', [ProfileController::class, 'show'])->where('username', '[A-Za-z0-9-_]+');