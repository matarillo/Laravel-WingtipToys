<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductListController extends Controller
{
    public function list(Request $request, $categoryId = 0) {
        $cartitemCount = 0;
        $categories = Category::withCount('products')->orderBy('id', 'asc')->get();
        if ($categoryId === 0) {
            $categoryName = 'All Items';
            $products = Product::with('category')->orderBy('id', 'asc')->get();
        } else {
            $category = Category::with('products')->find($categoryId);
            $categoryName = is_null($category) ? 'Category Not Found' : $category->name;
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
