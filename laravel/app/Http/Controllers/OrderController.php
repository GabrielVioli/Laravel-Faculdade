<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Order::with(['customer', 'product'])->get());
    }

    public function store(StoreOrderRequest $request): JsonResponse
    {
        $data = $this->calculateTotals($request->validated());

        $order = Order::create($data);

        return response()->json(
            $order->load(['customer', 'product']),
            Response::HTTP_CREATED,
        );
    }

    public function show(Order $order): JsonResponse
    {
        return response()->json($order->load(['customer', 'product']));
    }

    public function update(UpdateOrderRequest $request, Order $order): JsonResponse
    {
        $data = array_merge(
            $order->only(['customer_id', 'product_id', 'quantity', 'status']),
            $request->validated(),
        );

        $order->update($this->calculateTotals($data));

        return response()->json($order->fresh()->load(['customer', 'product']));
    }

    public function destroy(Order $order): Response
    {
        $order->delete();

        return response()->noContent();
    }

    private function calculateTotals(array $data): array
    {
        $product = Product::findOrFail($data['product_id']);
        $data['unit_price'] = $product->price;
        $data['total'] = (float) $product->price * (int) $data['quantity'];

        return $data;
    }
}
