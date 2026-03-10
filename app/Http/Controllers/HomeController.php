<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Show the application dashboard.
     */
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->with('user')->with('likes')->limit(3)->get();

        return view('home', ['posts' => $posts]);
    }
}
