<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('user.products.index')->with(compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::all();

        return view('user.products.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'style' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => '',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->name . '.' .
            $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Product::create([
            'name' => $request->input('name'),
            'style' => $request->input('style'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'image' => $newImageName,
        ]);
        return redirect(route('user.products.index'))->with('message', 'New Product has been added!');
    }

    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::all();

        return view('user.products.edit')->with(compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'style' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => '',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

        if($request->input('image')){
            $newImageName = uniqid() . '-' . $request->name . '.' .
                $request->image->extension();

            $request->image->move(public_path('images'), $newImageName);
        }else{
            $newImageName = $product->image;
        }


        $product->update([
            'name' => $request->input('name'),
            'style' => $request->input('style'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'image' => $newImageName,
        ]);

        return redirect(route('user.products.index'))->with('message', 'The Product has been updated!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('user.products.index'));
    }
}
