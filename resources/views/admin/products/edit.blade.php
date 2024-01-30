@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
    {{-- Delete Modal --}}
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">
            <a href="{{ route('admin.products.index') }}">
                Home /
            </a>
        </span> Edit Product
    </h4>
    <div id="success_message"></div>
    <div class="card">
        <div class="table-responsive text-nowrap">
            <form enctype="multipart/form-data" method="POST" action="{{ Route('admin.products.update', ['id' => $product->id]) }}">
                @csrf
                <div class="container">
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="product_name" class="form-label">Name<span class="text-error"></span></label>
                            <input type="text" id="product_name" name="product_name" class="form-control product_name"
                                value="{{ $product->product_name }}">
                            {!! $errors->first('product_name', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12">
                            <label for="product_slug" class="form-label">New<span class="text-error"></span></label>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="switch">
                                <input type="checkbox" {{ $product->product_new == 'on' ? 'checked' : '' }} name="product_new"
                                    id="product_new">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12">
                            <label for="product_slug" class="form-label">Feautured<span class="text-error"></span></label>
                        </div>
                        <div class="col-12 mb-2">
                            <label class="switch">
                                <input type="checkbox" {{ $product->product_featured == 'on' ? 'checked' : '' }}
                                    name="product_featured" id="product_featured">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="status" class="form-label">Visible In Menu<span class="text-error"></span></label>
                            <select name="status" class="form-select">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            {!! $errors->first('status', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            @if($product->product_image)
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="{{ asset($product->product_image) }}" style="width:30%" class=""/>
                                </div>
                            @endif
                            <label for="product_image" class="form-label">Image<span class="text-error"></span></label>
                            <input type="file" id="product_image" name="product_image" class="form-control product_image"
                                >
                            {!! $errors->first('product_image', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="price" class="form-label">Price<span class="text-error"></span></label>
                            <input type="text" id="price" name="price" class="form-control price"
                                value="{{ $product->price }}">
                            {!! $errors->first('price', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="special_price" class="form-label">Special Price<span
                                    class="text-error"></span></label>
                            <input type="text" id="special_price" name="special_price"
                                class="form-control special_price" value="{{ $product->special_price }}">
                            {!! $errors->first('special_price', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="quantity" class="form-label">Quantity<span class="text-error"></span></label>
                            <input type="text" id="quantity" name="quantity" class="form-control quantity"
                                value="{{ $product->quantity ? $product->quantity : '' }}">
                            {!! $errors->first('quantity', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="description" class="form-label">Description<span
                                    class="text-error"></span></label>
                            <textarea id="description" name="description">{{ $product->description }}</textarea>
                            {!! $errors->first('description', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="categories" class="form-label">Categories<span class="text-error"></span></label>
                            <ul class="category_list">
                                @foreach ($categories as $category)
                                    <li>
                                        <input type="checkbox" name="category[]" id="category_input"
                                            @if (in_array($category->id, $product->categories->pluck('id')->toArray())) checked @endif
                                            value="{{ $category->id }}">
                                        <span>{{ $category->name }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            {!! $errors->first('category', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="flex-center text-white ">Save Category</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        function ShowPhoto(event) {
            var output = document.getElementById('product_image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        }
        var description = document.getElementById('description');
        CKEDITOR.replace('description');
    </script>
@endsection
