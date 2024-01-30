@extends('admin.layouts.app')

@section('title', 'Add Category')

@section('content')
    {{-- Delete Modal --}}
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">
            <a href="{{ route('admin.categories.index') }}">
                Home /
            </a>
        </span> Add Category
    </h4>
    <div id="success_message"></div>
    <div class="card">
        <div class="table-responsive text-nowrap">
            <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="name" class="form-label">Name<span class="text-error"></span></label>
                            <input type="text" id="name" name="name" class="form-control name"
                                value="{{ old('name') }}">
                            {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="status" class="form-label">Visible In Menu<span class="text-error"></span></label>
                            <select name="status" class="form-select">
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            {!! $errors->first('status', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="logo" class="form-label">Logo<span class="text-error"></span></label>
                            <input type="file" id="logo" name="logo" class="form-control logo"
                                value="{{ old('logo') }}">
                            {!! $errors->first('logo', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="description" class="form-label">Description<span class="text-error"></span></label>
                            <textarea id="description" name="description">{{ old('description') }}</textarea>
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
