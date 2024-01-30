@extends('admin.layouts.app')



@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">
            <a href="{{ route('admin.orders.index') }}">
                Home /
            </a>
        </span> Orders
    </h4>
    <div id="success_message"></div>
    <div class="card">
        <div class="d-flex justify-content-between  items-center">
            <div class="col-lg-3 col-md-6 mb-0 mt-3  mx-3">
                <form action="" method="get" id="searchForm">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="category-addon-search"><i class="bx bx-search"></i></span>
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search ..."
                            value="{{ request()->get('search') }}" autofocus>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <nav class="nav-pagination" aria-label="Page navigation">
                <div class="row mb-0">
                    <div class="label col-lg-10 col-md-6 mx-3">
                        <span>Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }}
                            of total {{ $orders->total() }} entries</span>
                    </div>
                </div>
            </nav>
            <table class="table" id="table_id" style="width: 100%">
                <thead>
                    <tr class="text-center">
                        <th>
                            <a class="text-dark">
                                Created At

                            </a>
                        </th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($orders as $key => $order)
                        <tr class="text-center">
                            <td>{{ $order->created_at->format('Y-m-d ') }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td>
                                <a href="{{ Route('admin.orders.show', ['id' => $order->id]) }}"
                                    class="edit_slider  btn btn-primary editbtn btn-sm" title="Edit">
                                    Show
                                </a>
                                <a href="{{ route('admin.orders.update', ['id' => $order->id]) }}"
                                    class="update btn btn-success {{ $order->status === 'completed' ? 'disabled' : '' }} btn-sm updatebtn" title="Update">
                                    Update Status</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row my-3">
                <div class="col-lg-8 mx-2">
                    @if ($orders->hasPages())
                        {{ $orders->links('admin.pagination.index') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
