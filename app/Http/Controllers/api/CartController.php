<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use HasFactory;

    public static function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Cart::all());
    }

    public static function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $cart = Cart::query()->create([
            'user_id' => $request->get('user_id'),
            'product_id' => $request->get('product_id'),
            'count' => $request->get('count'),
        ]);

        return response()->json($cart);
    }

    public static function show(string $id): \Illuminate\Http\JsonResponse
    {
        return response()->json(Cart::query()->find($id));
    }

    public static function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $cart = Cart::query()->find($id);

        $cart->update([
            'user_id' => $request->get('user_id'),
            'product_id' => $request->get('product_id'),
            'count' => $request->get('count'),
        ]);

        return response()->json($cart);
    }

    public static function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        Cart::query()->find($id)->delete();
        return response()->json('Cart deleted successfully');
    }
}
