<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $order->load('orderItems', 'address');

        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $status = 'completed';
        $order->update(['status' => $status]);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order status updated successfully');
    }
}
