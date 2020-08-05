<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Category;
use App\ShoppingCart;
use App\Product;

class CartController extends Controller
{
    private function getShoppingCart(Request $request)
    {
        $session = $request->session();
        $cartId = $session->get('cartId');
        if (is_null($cartId)) {
            Log::debug('No cartId in session. generating cartId and save into session...');
            $cartId = ShoppingCart::newUuidString();
            $session->put('cartId', $cartId);
        }
        return new ShoppingCart($cartId, true);
    }

    public function list(Request $request)
    {
        $cart = $this->getShoppingCart($request);
        $cartitems = $cart->cartitems;
        $cartitemCount = $cart->countItems();
        return view('cart', [
            'cartitemCount' => $cartitemCount,
            'cartitems' => $cartitems,
        ]);
    }

    public function add(Request $request)
    {
        $ProductId = $request->input('ProductId');
        $categoryId = intval($request->input('categoryId'));
        $product = Product::find($ProductId);
        if (!is_null($product)) {
            $cart = $this->getShoppingCart($request);
            $cart->apppend($product);
        }
        if ($categoryId === 0) {
            return redirect()->route('product_all');
        } else {
            return redirect()->route('product_category', $categoryId);
        }
    }
}
