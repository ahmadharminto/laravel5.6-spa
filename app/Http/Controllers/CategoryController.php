<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return CategoryResource::collection(Category::latest()->get());
    }
    
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();

        return response()->json(['message' => 'Created'], Response::HTTP_CREATED);
    }
    
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
    
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);
        return response()->json(['message' => 'Updated'], Response::HTTP_ACCEPTED);
    }
    
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['message' => 'Deleted'], Response::HTTP_NO_CONTENT);
    }
}
