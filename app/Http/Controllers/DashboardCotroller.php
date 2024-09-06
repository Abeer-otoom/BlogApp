<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class DashboardCotroller extends Controller
{
    public function index(Request $request)
    {
       $posts=Post::orderBy('created_at' , 'desc')->get();
        return view('dashboard' , compact('posts'));


    }
}
