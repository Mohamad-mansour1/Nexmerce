<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        if (Auth::check()) {
            $user = auth()->user();
            $cartItems = $user->cart;
            $productIds = $cartItems->pluck('product_id')->toArray();
        } else {
            $cartItems = session()->get('cart', []);
            $productIds = array_keys($cartItems);
        }
    
        $products = Product::whereIn('id', $productIds)->get();
        // dd($products);
    
        return view('website.cart', compact('cartItems', 'products'));
    }
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product = Product::find($productId);
        $quantityAvailable = $product->quantity;
        if (Auth::check()) {
            $userId = auth()->user()->id;
            // return response()->json(['message' => $quantity]);
            $cart = Cart::where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();
            if ($cart) {
                if ($cart->quantity >= $quantityAvailable) {
                    return response()->json(['error' => 'Invalid quantity requested']);
                }
            }
            if ($quantityAvailable > 0 && $quantity <= $quantityAvailable) {
                if ($cart) {
                    $newQuantity = $cart->quantity + $quantity;
                    $cart->update([
                        'quantity' => $newQuantity,
                    ]);
                } else {
                    Cart::create([
                        'user_id' => $userId,
                        'product_id' => $productId,
                        'quantity' => $quantity,
                    ]);
                }

                return response()->json(['message' => 'Product added to cart']);
            } else {
                return response()->json(['error' => 'Invalid quantity requested']);
            }
        } else {
            $cart = session()->get('cart', []);

            if ($cart) {
                foreach ($cart as $productIds => $cartQuantity) {
                    if ($productIds == $productId) {
                        
                        $availableQuantity = $quantityAvailable;
                        
                        if ($cartQuantity >= $availableQuantity) {
                            return response()->json(['error' => 'Invalid quantity requested']);
                        }
                    }
                }            
            }
            if ($quantityAvailable > 0 && $quantity <= $quantityAvailable) {
                if (isset($cart[$productId])) {
                    $cart[$productId] += $quantity;
                } else {
                    $cart[$productId] = $quantity;
                }

                session()->put('cart', $cart);

                return response()->json(['message' => 'Product added to cart']);
            } else {
                return response()->json(['error' => 'Invalid quantity requested']);
            }
        }
    }

    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Auth::check()) {
        } else {
            $cart = session()->get('cart', []);
            $cart[$productId] = $quantity;
            session(['cart' => $cart]);
        }

        return response()->json(['message' => 'Cart updated successfully']);
    }

    public function removeCart(Request $request)
    {
        $productId = $request->input('product_id');

        if (Auth::check()) {
            $user = auth()->user();
            $user->cart()->where('product_id', $productId)->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session(['cart' => $cart]);
            }
        }

        return response()->json(['message' => 'Product removed from cart']);
    }
}
