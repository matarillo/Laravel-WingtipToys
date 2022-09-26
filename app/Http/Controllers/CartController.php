<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ShoppingCartService;

class CartController extends Controller
{
    public function list(Request $request, ShoppingCartService $cart)
    {
        $cartItems = $cart->getCartItems();
        $cartitemCount = $cart->sumQuantities($cartItems);
        return view('cart', [
            'cartItemCount' => $cartitemCount,
            'cartItems' => $cartItems,
        ]);
    }

    public function add(Request $request, ShoppingCartService $cart)
    {
        $productId = intval($request->input('productId'));
        $categoryId = intval($request->input('categoryId'));
        $product = Product::find($productId);
        if (!is_null($product)) {
            $cart->apppend($product->id);
        }
        if ($categoryId === 0) {
            return redirect()->route('product.all');
        } else {
            return redirect()->route('product.category', $categoryId);
        }
    }
}
