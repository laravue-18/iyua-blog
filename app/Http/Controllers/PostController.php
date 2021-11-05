<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('user.posts.index')->with(compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('user.posts.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => '',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' .
            $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'category_id' => $request->input('category_id') ? $request->input('category_id') : 0,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image' => $newImageName,
            'user_id' => auth()->id()
        ]);
        return redirect(route('user.posts.index'))->with('message', 'Your Post has been added!');
    }

    public function show(Post $post)
    {
        return view('home.posts.show')->with(compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('user.posts.edit')->with(compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'category_id' => '',
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

        if($request->image){
            $newImageName = uniqid() . '-' . $request->title . '.' .
                $request->image->extension();

            $request->image->move(public_path('images'), $newImageName);
        }else{
            $newImageName = $post->image;
        }

        $post->update([
            'category_id' => $request->input('category_id') ? $request->input('category_id') : 0,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image' => $newImageName,
            'user_id' => auth()->id()
        ]);
        return redirect(route('user.posts.index'))->with('message', 'Your Post has been updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('user.posts.index'));
    }
}
