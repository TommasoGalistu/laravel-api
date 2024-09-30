<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
       $posts = Post::orderBy('id', 'desc')->with('category', 'types')->get();
       return response()->json($posts);
    }
    public function getCategory(){
        $categories = Category::all();
       return response()->json($categories);
    }
}
