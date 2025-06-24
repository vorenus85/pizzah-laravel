@extends('layouts.admin')

@section('title')
    <h1>Új termék</h1>
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.product.store') }}" class="mt-4">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="product-name" class="form-label">Termék Neve</label>
                            <input name="name" id="product-name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Név" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="product-slug" class="form-label">Termék url-e</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="product-slug" name="slug" placeholder="Url" value="{{ old('slug') }}" required>
                        </div>
                        @error('slug')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="description" class="form-label">Leírás</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Leírás" required>{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="price" class="form-label">Ár (Ft)</label>
                            <input name="price" id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" placeholder="Ár" value="{{ old('price') }}" required>
                        </div>
                        @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="discount_price" class="form-label">Kedvezményes ár (Ft)</label>
                            <input name="discount_price" id="discount_price" type="number" step="0.01" class="form-control" placeholder="Kedvezményes ár" value="{{ old('discount_price') }}">
                        </div>
                    </div>
                </div>

                <!-- TODO méretek, hozzá spec árak -->

                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked role="switch" id="product-status" name="status">
                            <label class="form-check-label" for="product-status">Aktív</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="category_id" class="form-label">Kategória</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                <option value="">Válassz kategóriát</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Mentés</button>
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
