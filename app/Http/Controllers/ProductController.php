<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newProduct = Product::create($request->all());
        return response()->json($newProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, 204);
    }

    public function uploadImage(Request $request, Product $product)
    {
        $image = $request->file('image');
        if (!$image->isValid()){
            return response()->json(['error' => 'Invalid image'], 400);
        }

        $path = $image->storeAs('product_images', $image->getClientOriginalName(), 'public');
        $url = asset('storage/' . $path);
        $product->image_url = $url;
        $product->update();
        return response()->json(['message' => 'Image uploaded successfully'], 200);
    }
}
