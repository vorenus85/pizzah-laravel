@extends('layouts.admin')

@section('title')
    <h1>@lang('admin.pages.products.new_title')</h1>
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.product.store') }}" class="mt-4">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="name" class="form-label">@lang('admin.form.name')</label>
                            <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="@lang('admin.form.name')" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
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
                        <div class="">
                            <label for="description" class="form-label">@lang('admin.form.description')</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="@lang('admin.form.description')" required>{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="price" class="form-label">@lang('admin.form.price')</label>
                            <input name="price" id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" placeholder="@lang('admin.form.price')" value="{{ old('price') }}" required>
                        </div>
                        @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="discount_price" class="form-label">@lang('admin.form.special_price')</label>
                            <input name="discount_price" id="discount_price" type="number" step="0.01" class="form-control" placeholder="@lang('admin.form.special_price')" value="{{ old('discount_price') }}">
                        </div>
                    </div>
                </div>

                <!-- TODO méretek, hozzá spec árak -->

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
                            <label for="category_id" class="form-label">@lang('admin.form.category')</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option value="">@lang('admin.form.choose_category')</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
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
            $('#product-name').on('input', function() {
                const inputText = $(this).val();
                const slug = slugify(inputText);
                $('#product-slug').val(slug);
            });
        })
    </script>
@endsection
