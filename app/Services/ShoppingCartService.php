<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use App\Models\CartItem;

class ShoppingCartService
{
    public $cartId;

    private static function newUuidString()
    {
        return Uuid::uuid4()->toString();
    }

    private static function getOrCreateCartId(Store $store)
    {
        $cartId = $store->get('cartId');
        if (is_null($cartId)) {
            Log::debug('No cartId in session. generating cartId and save into session...');
            $cartId = ShoppingCartService::newUuidString();
            $store->put('cartId', $cartId);
        }
        return $cartId;
    }

    function __construct(Request $request)
    {
        $store = $request->getSession();
        $this->cartId = ShoppingCartService::getOrCreateCartId($store);
    }

    function getCartItems($requireProduct = false)
    {
        if ($requireProduct) {
            $query = Cartitem::with('product')->where('cart_id', $this->cartId);
        } else {
            $query = Cartitem::where('cart_id', $this->cartId);
        }
        $items = $query->get();
        if (is_null($items)) {
            Log::debug('cartId: ' . $this->cartId . ' item not found');
        } else {
            Log::debug('cartId: ' . $this->cartId . ' ' . $items->count() . ' items found');
        }
        return $items;
    }

    function sumQuantities($items = null)
    {
        if (is_null($items)) {
            $items = $this->getCartItems();
        }
        if (is_null($items)) {
            return 0;
        }
        return $items->sum('quantity');
    }

    function apppend(int $productId)
    {
        if ($productId <= 0) {
            return;
        }
        $item = CartItem::where('cart_id', $this->cartId)
            ->where('product_id', $productId)
            ->first();
        if (is_null($item)) {
            $item = new CartItem();
            $item->cart_id = $this->cartId;
            $item->product_id = $productId;
            $item->quantity = 1;
        } else {
            $item->quantity++;
        }
        $item->save();
    }

    function deleteAll()
    {
        foreach ($this->getCartItems() as $item) {
            $this->delete($item);
        }
    }

    function delete(CartItem $item)
    {
        $itemId = $item->id;
        $item->delete();
        Log::debug('ItemId: ' . $itemId . ' clear');
    }
}
