<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:products,name',
            'slug' => 'required|string|unique:products,slug',
            'status' => 'nullable|in:on,off',
            'description' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            Product::create($validated);

            return redirect()->route('admin.products')->with([
                'message_type' => 'success',
                'message' => 'Sikeresen létrehoztad a terméket.'
            ]);
        }
        catch (\Exception $exception){
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
    public function edit($productId)
    {
        $categories = Category::all();
        $product = Product::findOrFail($productId);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // dd($request);

        $validated = $request->validate([
            'name' => 'required|string|unique:categories,name,' . $product->id,
            'slug' => 'required|string|unique:categories,slug,' . $product->id,
            'status' => 'string',
            'description' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            $product->update($validated);
            return redirect()->route('admin.product.edit', $product)->with(['message'=>'Termék sikeresen frissítve.', "message_type" => "success"]);
        } catch(\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->route('admin.product.edit', $product)->with(['message'=>'Hoppá, valami probléma történt, a szaki hamarosan javítja.', "message_type" => "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('admin.products')->with(['message'=>'Sikeresen törölted a terméket.', "message_type" => "success"]);
        }catch (\Exception $exception){
            Log::info($exception);
            return redirect()->route('admin.products')->with(['message'=>'Hoppá, valami probléma történt, a szaki hamarosan javítja.', "message_type" => "danger"]);
        }
    }
}
