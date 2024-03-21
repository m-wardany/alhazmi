<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $product = new Product($request->validated());

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('products', $request->file('image'));
            $product->image = $path;
        }
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product created successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.form', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->fill($request->validated());

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('products', $request->file('image'));
            $product->image = $path;
        }
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);


        $product->delete();


        return redirect()->route('product.index')->with('success', 'product deleted successfully!');

    }
}
