<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('user.product-categories.index')->with(compact('categories'));
    }

    public function create()
    {
        return view('user.product-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        ProductCategory::create([
            'name' => $request->input('name'),
            'slug' => SlugService::createSlug(ProductCategory::class, 'slug', $request->name),
        ]);
        return redirect(route('user.product-categories.index'))->with('message', 'Your Category has been added!');
    }

    public function show(ProdcutCategory $prodcutCategory)
    {
        //
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('user.product-categories.edit')->with(compact('productCategory'));
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $productCategory->update([
            'name' => $request->input('name'),
            'slug' => SlugService::createSlug(ProductCategory::class, 'slug', $request->name),
        ]);
        return redirect(route('user.product-categories.index'))->with('message', 'Your Category has been updated!');
    }

    public function destroy(ProductCategory $productCategory)
    {
        foreach ($productCategory->products as $product){
            $product->update(['category_id' => 0]);
        }
        $productCategory->delete();

        return redirect(route('user.product-categories.index'))->with('message', 'Category has been deleted!');
    }
}
