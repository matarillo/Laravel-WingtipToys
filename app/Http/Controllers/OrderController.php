<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Category;
use App\ShoppingCart;
use App\Product;

class OrderController extends Controller
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

    public function exec(Request $request)
    {
        $cart = $this->getShoppingCart($request);
        $cart->deleteAll();
        return redirect()->route('product_all');
    }
}
