<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use Illuminate\Http\JsonResponse;


class SizeController extends Controller
{
    public function index(): JsonResponse
    {
        $sizes = Size::all();
        return response()->json($sizes);
    }


    public function store(StoreSizeRequest $request): JsonResponse
    {
        $data = $request->validated();
        $size = Size::create([
            'name' => $data['name'],
        ]);

        return response()->json($size, 201);
    }


    public function show(Size $size): JsonResponse
    {
        return response()->json($size);
    }


    public function update(StoreSizeRequest $request, Size $size): JsonResponse
    {
        $data = $request->validated();
        $size->update(['name' => $data['name']]);
        return response()->json($size, 200);
    }


    public function destroy(Size $size): JsonResponse
    {
        $size->delete();

        return response()->json(['message' => 'Size deleted successfully'], 200);
    }
}
