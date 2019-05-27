<?php

namespace App\Http\Controllers\Post;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(){
    	$table = Post::all();
    	return view('post.post')->with(['table' => $table]);
    }
}
