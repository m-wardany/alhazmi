<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductCatalogueRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
     * Show the form for editing the specified resource.
     */
    public function editCatalogue()
    {
        $catalogue = Setting::firstWhere('key', Setting::CATALOGUE_URL);
        return view('product.catalogue_form', compact('catalogue'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCatalogue(UpdateProductCatalogueRequest $request)
    {
        $catalogue = Setting::firstWhere('key', Setting::CATALOGUE_URL);

        if ($request->hasFile('file')) {
            $path = Storage::disk('public')->put('catalogue', $request->file('file'));
            $catalogue->value = $path;
        } else {
            $catalogue->value = null;
        }
        $catalogue->save();

        return redirect()->route('product.index')->with('success', 'Catalogue updated successfully!');
    }

    function downloadCatalogue(): StreamedResponse
    {
        $catalogue = Setting::firstWhere('key', Setting::CATALOGUE_URL);
        return Storage::disk('public')->download($catalogue->value, 'Alhazemi-Catalogue.pdf');
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
