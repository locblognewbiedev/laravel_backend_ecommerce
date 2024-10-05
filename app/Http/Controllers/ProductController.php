<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    public function index()
    {
        $productActived = Product::productActived()->get();
        return Response()->json($productActived);
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);
        return Response()->json($product);
    }


    public function show(Product $product)
    {
        return response()->json($product);
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product
        ]);
    }



    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
