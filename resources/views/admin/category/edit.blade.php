@extends('layouts.admin')

@section('title')
    <h1>Kategória szerkesztése</h1>
@endsection

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <form class="" method="POST" action="{{ route('admin.category.update', $category->id) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="category-name" class="form-label">Kategória neve</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="category-name" name="name" placeholder="Kategória neve" value="{{ old('name') ? old('name') : $category->name }}" required>
                        </div>
                        @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="category-slug" class="form-label">Kategória url-e</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="category-slug" name="slug" placeholder="Kategória url-e" value="{{ old('slug') ? old('slug') : $category->slug }}" required>
                        </div>
                        @error('slug')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="form-check form-switch">
                            <input type="hidden" name="status" value="off">
                            <input class="form-check-input" type="checkbox" @if($category->status == "on") checked @endif  role="switch" id="category-status" name="status" value="on">
                            <label class="form-check-label" for="category-status">Aktív</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 col-xs 12">
                        <div class="">
                            <label for="category-description" class="form-label">Kategória leírása</label>
                            <textarea class="form-control" id="category-description" name="description" style="height: 100px">{{$category->description}}</textarea>
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
            $('#category-name').on('input', function() {
                const inputText = $(this).val();
                const slug = slugify(inputText);
                $('#category-slug').val(slug);
            });
        })
    </script>
@endsection
