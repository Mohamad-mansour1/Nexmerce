@extends('admin.layouts.app')

@section('title', 'Edir Category')

@section('content')
    {{-- Delete Modal --}}
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">
            <a href="{{ route('admin.categories.index') }}">
                Home /
            </a>
        </span> Edit Category
    </h4>
    <div id="success_message"></div>
    <div class="card">
        <div class="table-responsive text-nowrap">
            <form enctype="multipart/form-data" method="POST" action="{{ Route('admin.categories.update', ['id' => $category->id]) }}">
                @csrf
                <div class="container">
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="name" class="form-label">Name<span class="text-error"></span></label>
                            <input type="text" id="name" name="name" class="form-control name"
                                value="{{ $category->name }}">
                            {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="status" class="form-label">Visible In Menu<span class="text-error"></span></label>
                            <select name="status" class="form-select">
                                <option @if($category->status == 1) selected @endif value="1">Yes</option>
                                <option @if($category->status == 0) selected @endif value="0">No</option>
                            </select>
                            {!! $errors->first('status', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            @if($category->logo)
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="{{ asset($category->logo) }}" style="width:30%" class=""/>
                                </div>
                            @endif
                            <label for="logo" class="form-label">Logo<span class="text-error"></span></label>
                            <input type="file" id="logo" name="logo" class="form-control logo"
                                value="{{ $category->logo }}">
                            {!! $errors->first('logo', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="description" class="form-label">Description<span class="text-error"></span></label>
                            <textarea id="description" name="description">{{ $category->description }}</textarea>
                            {!! $errors->first('description', "<span class='text-danger'>:message</span>") !!}
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
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        }
        var description = document.getElementById('description');
        CKEDITOR.replace('description');
    </script>
@endsection
