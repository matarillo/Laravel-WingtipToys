<?php

namespace App;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Log;

class ShoppingCart
{
    public $cartId;
    public $cartitems;

    static function newUuidString()
    {
        return Uuid::uuid4()->toString();
    }

    function __construct($cartId, $requireProduct = false)
    {
        $this->cartId = $cartId;
        if ($requireProduct) {
            $query = Cartitem::with('product')->where('CartId', $cartId);
        } else {
            $query = Cartitem::where('CartId', $cartId);
        }
        $this->cartitems = $query->get();
        if (is_null($this->cartitems)) {
            Log::debug('cartId: ' . $cartId . ' item not found');
        } else {
            Log::debug('cartId: ' . $cartId . ' ' . $this->cartitems->count() . ' items found');
        }
    }

    function countItems()
    {
        if (is_null($this->cartitems)) {
            return 0;
        }
        return $this->cartitems->sum('Quantity');
    }

    function apppend($product)
    {
        Log::debug('appending. itemCount: ' . $this->countItems());
        if ($product === null) {
            return;
        }
        $item = Cartitem::where('CartId', $this->cartId)
            ->where('ProductId', $product->ProductId)
            ->first();
        if (is_null($item)) {
            $item = new Cartitem();
            $item->ItemId = Uuid::uuid4()->toString();
            $item->CartId = $this->cartId;
            $item->Quantity = 1;
            $item->DateCreated = Carbon::now();
        } else {
            $item->Quantity++;
        }
        $item->ProductId = $product->ProductId;
        $item->save();
    }

    function deleteAll()
    {
        foreach ($this->cartitems as $item) {
            sleep(3);
            $this->delete($item->ItemId, $item);
        }
    }

    function delete($itemId, $item)
    {
        $item->delete();
        Log::debug('ItemId: ' . $itemId . ' clear');
    }
}
