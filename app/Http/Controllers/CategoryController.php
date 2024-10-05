<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return Response()->json($categories);
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);
        return Response()->json($category);
    }

    public function show(Category $category)
    {
        return Response()->json($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update([
            'name' => $data['name'],
        ]);
        return response()->json($category, 200);
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'category deleted successfully'], 200);
    }
}
