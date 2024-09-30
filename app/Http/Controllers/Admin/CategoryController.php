<?php

namespace App\Http\Controllers\Admin;

use App\Function\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Helper::generateSlug($data['name'], Category::class);
        $category = new Category();
        $category->fill($data);
        $category->save();

        return redirect()->route('admin.categories.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();
        if($data['name'] !== $category->name){
            $data['slug'] = Helper::generateSlug($data['name'], Category::class);
        }
        $category->update($data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('delete', 'Il tuo elemento è stato eliminato correttamente');
    }

    public function showAllCategories(){
        $categories = Category::all();
        return view('admin.categories.showAllCategories', compact('categories'));
    }
}
