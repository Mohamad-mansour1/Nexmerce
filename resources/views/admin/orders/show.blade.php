@extends('admin.layouts.app')

@section('title', 'Show Order')

@section('content')
    {{-- Delete Modal --}}
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">
            <a href="{{ route('admin.orders.index') }}">
                Home /
            </a>
        </span> Show Order
    </h4>
    <div id="success_message"></div>
    <div class="card">
        <div class="table-responsive text-nowrap">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-2 p-4">
                        <h2 class="text-primary">Order Details</h2>
                        <p><b>Order ID:</b>{{ $order->id }}</p>
                        <p><b>Shipping Address:</b>{{ $order->address->address }}</>

                        <h4>Order Items</h4>
                        <table class="table" id="table_id" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->special_price === '' ? $item->special_price : $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
