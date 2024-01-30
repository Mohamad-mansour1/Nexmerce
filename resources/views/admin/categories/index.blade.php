@extends('admin.layouts.app')



@section('content')

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a href="{{ route('admin.categories.index') }}">
                    Home /
                </a>
            </span> Category
        </h4>
        <div id="success_message"></div>
        <div class="card">
            <div class="d-flex justify-content-between  items-center">
                <div class="col-lg-3 col-md-6 mb-0 mt-3  mx-3">
                    <form action="" method="get" id="searchForm">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text" id="category-addon-search"><i class="bx bx-search"></i></span>
                            <input type="text" id="search" name="search" class="form-control"
                                placeholder="Search ..." value="{{ request()->get('search') }}" autofocus>
                        </div>
                    </form>
                </div>
                <div class="m-3 d-flex gap-2">
                    <div>
                        <a href="{{ Route('admin.categories.create') }}" type="button" class="btn btn-primary">
                            <span class="flex-center text-white ">Add Category <i class="bx bx-plus"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <nav class="nav-pagination" aria-label="Page navigation">
                    <div class="row mb-0">
                        <div class="label col-lg-10 col-md-6 mx-3">
                            <span>Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }}
                                of total {{ $categories->total() }} entries</span>
                        </div>
                    </div>
                </nav>
                <table class="table" id="table_id" style="width: 100%">
                    <thead>
                        <tr class="text-center">
                            <th>
                                <a class="text-dark"
                                    href="{{ route('admin.categories.index', ['sort' => 'created_at', 'direction' => $sortColumn == 'created_at' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $key => $category)
                        <tr class="text-center">
                                <td>{{ $category->created_at ? $category->created_at->format('Y-m-d') : '0000-00-00 00:00:00' }}</td> 
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status  }}</td>
                                <td>
                                    <a href="{{ Route('admin.categories.edit', ['id' => $category->id]) }}" class="edit_category  btn btn-primary editbtn btn-sm" title="Edit">
                                        Edit
                                    </a>
                                    <a href="{{ Route('admin.categories.destroy', ['id' => $category->id]) }}" class="delete_category btn btn-danger btn-sm deletebtn" title="Delete">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row my-3">
                    <div class="col-lg-8 mx-2">
                        @if ($categories->hasPages())
                            {{ $categories->links('admin.pagination.index') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
