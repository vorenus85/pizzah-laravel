@extends('admin.layouts.master')

@section('title')
    <h1>@lang('admin.pages.categories.new_title')</h1>
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form class="" method="POST" action="{{ route('admin.category.store') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="name" class="form-label">@lang('admin.form.name')</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="@lang('admin.form.name')" value="{{ old('name') }}" required>
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="slug" class="form-label">@lang('admin.form.url')</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="@lang('admin.form.url')" value="{{ old('slug') }}" required>
                        </div>
                        @error('slug')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked role="switch" id="status" name="status">
                            <label class="form-check-label" for="status">@lang('admin.form.active')</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="description" class="form-label">@lang('admin.form.description')</label>
                            <textarea class="form-control" id="description" name="description" style="height: 100px"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">@lang('admin.btn.save')</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#name').on('input', function() {
                const inputText = $(this).val();
                const slug = slugify(inputText);
                $('#slug').val(slug);
            });
        })
    </script>
@endsection
