<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $last_element = Post::orderBy('id', 'desc')->first();
        return view('admin.index', compact('last_element'));
    }
}
