<?php

namespace App\Http\Controllers\Admin;

use App\Function\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Type;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(8);
        $types = Type::all();
        return view('admin.posts.index', compact('posts', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $types = Type::all();
        return view('admin.posts.create', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();

        $post = new Post();
       $post->slug = Helper::generateSlug($data['title'], Post::class);
       $post->added_at = date('d/m/Y');

       if($request->hasFile('path_img')){
         $path_img = Storage::put('uploads', $request['path_img']);
         $original_name_img = $request->file('path_img')->getClientOriginalName();
         $data['path_img'] = $path_img;
         $data['original_name_img'] = $original_name_img;
       }
       $post->fill($data);
       $post->save();

       if(array_key_exists('type', $data)){
            $post->types()->attach($data['type']);
       }

       return redirect()->route('admin.posts.show', compact('post'));



    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $types = Type::all();
        return view('admin.posts.show', compact('post', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $types = Type::all();

        return view('admin.posts.edit', compact('post', 'categories', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {

        $data = $request->all();
        $post = Post::find($post->id);

        if($data['title'] !== $post->title){
            $data['slug'] = Helper::generateSlug($data['title'], Post::class);
        }

        if(array_key_exists('path_img', $data)){
            $path_img = Storage::put('uploads', $data['path_img']);
            $original_name_img = $request->file('path_img')->getClientOriginalName();
            $data['path_img'] = $path_img;
            $data['original_name_img'] = $original_name_img;
          }
        $post->update($data);
        if(array_key_exists('type', $data)){
            $post->types()->sync($data['type']);
       }
        return redirect()->route('admin.posts.show', compact('post'))->with('status', 'Il post è stato modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post->delete();
        return redirect()->route('admin.posts.index')->with('status', 'Hai eliminato correttamente il post numero' . $post->id);
    }
}
