@extends('layouts.admin')

@section('title')
    <h1 class="mb-5">@lang('admin.pages.categories.title')</h1>
@endsection

@section('content')
    <div class="d-flex justify-content-end mb-5">
        <a href="{{ route('admin.category.create') }}" class="btn btn-info">Új kategória</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">@lang('admin.table.image')</th>
            <th scope="col">@lang('admin.table.name')</th>
            <th scope="col">@lang('admin.table.status')</th>
            <th scope="col">@lang('admin.table.actions')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $index => $category)
            <tr>
                <th scope="row">{{$index+1}}.</th>
                <td>[image]</td>
                <td><a href="{{route('admin.category.edit', $category->id)}}">{{ $category->name }}</a></td>
                <td>
                    <div class="d-flex">
                        <!-- TODO ajax update -->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" @if($category->status == "on") checked @endif role="switch" id="category-status" name="status">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-primary m-2" title="Szerkesztés"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('@lang('admin.table.delete_confirm')')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-2" title="@lang('admin.btn.delete')"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
