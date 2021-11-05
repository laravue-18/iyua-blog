<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('user.categories.index')->with(compact('categories'));
    }

    public function create()
    {
        return view('user.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->input('name'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->name),
        ]);
        return redirect(route('user.categories.index'))->with('message', 'Your Category has been added!');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('user.categories.edit')->with(compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update([
            'name' => $request->input('name'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->name),
        ]);
        return redirect(route('user.categories.index'))->with('message', 'Your Category has been updated!');
    }

    public function destroy(Category $category)
    {
        foreach ($category->posts as $post){
            $post->update(['category_id' => 0]);
        }
        $category->delete();

        return redirect(route('user.categories.index'))->with('message', 'Category has been deleted!');
    }
}
