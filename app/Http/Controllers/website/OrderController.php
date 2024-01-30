<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);
        $name = $request->input('name');
        $address = $request->input('address');
        $email = $request->input('email');
        $note = $request->input('note');
        $user = auth()->user();
        $totalPrice = $this->totalPrice($user);


        // dd($totalPrice);
        $order = new Order();
        $order->user_id = auth()->id();
        $order->total_amount = $totalPrice;
        $order->save();

        $orderId = $order->id;
        $address = $this->address($orderId, $name, $address, $email, $note);

        $cartItems = Cart::where('user_id', auth()->id())->get();
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product->quantity >= $cartItem->quantity)
                $quantity = $cartItem->quantity;
            else
                $quantity = $product->quantity;
            if ($product) {
                $product->decrement('quantity', $quantity);

                if ($product->special_price)
                    $price = $product->special_price;
                else
                    $price =$product->price;

                $orderItem = new OrderItem();
                $orderItem->order_id = $orderId;
                $orderItem->product_id = $product->id;
                $orderItem->quantity = $quantity;
                $orderItem->price = $price;
                $orderItem->save();
                $cartItem->delete();
            }
        }

        return redirect()->route('index')->with('success', 'Ordered successfully!');
    }
    public function totalPrice($user)
    {
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
        return $totalPrice;
    }
    public function address($orderId, $name, $address, $email, $note)
    {
        Address::create([
            'order_id' => $orderId,
            'name' => $name,
            'address' => $address,
            'email' => $email,
            'note' => $note,
        ]);
    }
}
