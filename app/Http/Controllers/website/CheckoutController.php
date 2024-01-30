<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'You need to login first');
        }
        $user = auth()->user();
        $cartItems = $user->cart;
        $productIds = $cartItems->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get();


        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product) {

                if ($product->special_price)
                    $price = $product->special_price;
                else
                    $price = $product->price;
                $subtotal = $price * $cartItem->quantity;
                $totalPrice += $subtotal;
            }
        }

        return view('website.checkout', compact('cartItems', 'products', 'totalPrice'));
    }
}
