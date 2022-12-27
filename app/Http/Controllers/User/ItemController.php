<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\PrimaryCategory;


class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');

        $this->middleware(
            function ($request, $next) {

                $id = $request->route()->parameter('item');
                if (!is_null($id)) { // null判定
                    $itemId = Product::availableItems()->where('products.id', $id)->exists();
                    if (!$itemId) {
                        abort(404);
                    }
                }
                return $next($request);
            }
        );
    }

    public function index(Request $request)
    {
        // dd($request);
        $products = Product::availableItems()
        ->selectCategory($request->category ?? '0') //scope  product.php
        ->searchKeyword($request->keyword) //scope  product.php
        ->sortOrder($request->sort) //scope  product.php
        ->paginate($request->pagination ?? '20'); //scope  product.php

        $categories = PrimaryCategory::with('secondary')->get();

        return view('user.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)->sum('quantity');

        if ($quantity > 9) {
            $quantity = 9;
        }

        return view('user.show', compact('product', 'quantity'));
    }
}
