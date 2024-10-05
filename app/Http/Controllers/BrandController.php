<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Response;


class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return Response()->json(
            $brands
        );
    }


    public function store(StoreBrandRequest $request)
    {
        $data = $request->validated();
        $brand = Brand::create($data);
        return Response()->json($brand);
    }


    public function show(Brand $brand)
    {
        return Response()->json($brand);
    }


    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $data = $request->validated();
        $brand->update([
            'name' => $data['name'],
        ]);
        return response()->json($brand, 200);
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->json(['message' => 'Brand deleted successfully'], 200);
    }
}
