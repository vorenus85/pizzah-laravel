<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all()->where('status', 'on');
        return view('admin.order.create', with(['products' => $products]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required',
            "payment_status" => "required",
            "delivery_status" => "required",
            "payment_type" => "required",
            "delivery_type" => "required",
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $total = 0;

            $productIds = collect($validated['products'])->pluck('product_id')->all();
            $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

            $orderItems = [];
            foreach ($validated['products'] as $item) {
                $product = $products[$item['product_id']];
                $quantity = (int) $item['quantity'];
                $lineTotal = $product->price * $quantity;

                $total += $lineTotal;

                $orderItems[] = new OrderItem([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);
            }

            $order = Order::create([
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'customer_address' => $validated['customer_address'],
                'customer_note' => $validated['customer_note'] ?? '',
                'payment_status' => $validated['payment_status'],
                'delivery_status' => $validated['delivery_status'],
                'payment_type' => $validated['payment_type'],
                'delivery_type' => $validated['delivery_type'],
                'sub_total' => $total,
                'delivery_cost' => 390,
                'payment_cost' => 0,
                'total' => $total,
            ]);

            $order->items()->saveMany($orderItems);

            DB::commit();

            return redirect()->route('admin.orders')->with([
                'message_type' => 'success',
                'message' => 'Sikeresen létrehoztad a rendelést.'
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
