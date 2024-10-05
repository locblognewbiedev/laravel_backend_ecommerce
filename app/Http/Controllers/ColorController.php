<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use Illuminate\Http\JsonResponse;

class ColorController extends Controller
{
    public function index(): JsonResponse
    {
        $colors = Color::all();
        return response()->json($colors);
    }


    public function store(StoreColorRequest $request): JsonResponse
    {
        $data = $request->validated();
        $color = Color::create([
            'name' => $data['name'],
        ]);

        return response()->json($color, 201);
    }


    public function show(Color $color): JsonResponse
    {
        return response()->json($color);
    }
    public function update(UpdateColorRequest $request, Color $color): JsonResponse
    {
        $data = $request->validated();
        $color->update([
            'name' => $data['name'],
        ]);
        return response()->json($color, 200);
    }


    public function destroy(Color $color): JsonResponse
    {
        $color->delete();

        return response()->json(['message' => 'Color deleted successfully'], 200);
    }
}
