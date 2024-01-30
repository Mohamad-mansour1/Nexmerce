@extends('admin.layouts.app')



@section('content')

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">
            <a href="{{ route('admin.products.index') }}">
                Home /
            </a>
        </span> Products
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
            <div class="m-3 d-flex gap-2">
                <div>
                    <a href="{{ Route('admin.products.create') }}" type="button" class="btn btn-primary">
                        <span class="flex-center text-white ">Create Product <i class="bx bx-plus"></i></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <nav class="nav-pagination" aria-label="Page navigation">
                <div class="row mb-0">
                    <div class="label col-lg-10 col-md-6 mx-3">
                        <span>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }}
                            of total {{ $products->total() }} entries</span>
                    </div>
                </div>
            </nav>
            <table class="table" id="table_id" style="width: 100%">
                <thead>
                    <tr class="text-center">
                        <th>
                            <a class="text-dark"
                                href="{{ route('admin.products.index', ['sort' => 'created_at', 'direction' => $sortColumn == 'created_at' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                                Created At
                                @if ($sortColumn == 'created_at')
                                    @if ($sortDirection == 'asc')
                                        <i class="fas fa-arrow-up"></i>
                                    @else
                                        <i class="fas fa-arrow-down"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($products as $key => $product)
                        <tr class="text-center">
                            <td>{{ $product->created_at->format('Y-m-d ') }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->status }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ Route('admin.products.edit', ['id' => $product->id]) }}"
                                    class="edit_slider  btn btn-primary editbtn btn-sm" title="Edit">
                                    Edit
                                </a>
                                <a href="{{ Route('admin.products.destroy', ['id' => $product->id]) }}"
                                    class="delete_slider btn btn-danger btn-sm deletebtn" title="Delete">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row my-3">
                <div class="col-lg-8 mx-2">
                    @if ($products->hasPages())
                        {{ $products->links('admin.pagination.index') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
