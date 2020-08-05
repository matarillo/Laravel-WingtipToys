<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Category;
use App\ShoppingCart;
use App\Product;

class ProductListController extends Controller
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
        return new ShoppingCart($cartId);
    }

    public function list(Request $request, $categoryId = 0)
    {
        $cartitemCount = $this->getShoppingCart($request)->countItems();
        $categories = Category::withCount('products')->orderBy('CategoryId', 'asc')->get();
        if ($categoryId === 0) {
            $categoryName = 'All Items';
            $products = Product::with('category')->orderBy('ProductId', 'asc')->get();
        } else {
            $category = Category::with('products')->find($categoryId);
            $categoryName = is_null($category) ? 'Category Not Found' : $category->CategoryName;
            $products = is_null($category) ? collect() : $category->products;
        }
        return view('product', [
            'currentUrl' => $request->url(),
            'cartitemCount' => $cartitemCount,
            'categories' => $categories,
            'categoryId' => $categoryId,
            'categoryName' => $categoryName,
            'products' => $products,
        ]);
    }
}
