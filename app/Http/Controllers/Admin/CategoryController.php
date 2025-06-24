<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name',
            'status' => 'string',
            'slug' => 'required|string|unique:categories,slug',
        ]);

        try {
            Category::create($validated);

            return redirect()->route('admin.categories')->with([
                'message_type' => 'success',
                'message' => 'Sikeresen létrehoztad a kategóriát.'
            ]);

        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withInput()->with([
                'message' => 'Hoppá, valami probléma történt, a szaki hamarosan javítja.',
                'message_type' => 'danger'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Category $category)
    {

        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->id,
            'slug' => 'required|string|unique:categories,slug,' . $category->id,
            'status' => 'string',
        ]);

        try {
            $category->update($validated);
            return redirect()->route('admin.category.edit', $category)->with(['message'=>'Kategória sikeresen frissítve.', "message_type" => "success"]);
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('admin.category.edit', $category)->with(['message'=>'Hoppá, valami probléma történt, a szaki hamarosan javítja.', "message_type" => "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('admin.categories')->with(['message'=>'Sikeresen törölted a kategóriát.', "message_type" => "success"]);
        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->route('admin.categories')->with(['message'=>'Hoppá, valami probléma történt, a szaki hamarosan javítja.', "message_type" => "danger"]);
        }
    }
}
