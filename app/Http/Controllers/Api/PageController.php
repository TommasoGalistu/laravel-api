<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
       $posts = Post::orderBy('id', 'desc')->with('category', 'types')->paginate(10);
       return response()->json($posts);
    }
    public function getCategory(){
        $categories = Category::all();
       return response()->json($categories);
    }

    public function getType(){
        $types = Type::all();

        return response()->json($types);
    }

}
