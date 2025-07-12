@extends('layouts.admin')

@section('title')
    <div class="container">
        <h1 class="mb-5">@lang('admin.pages.products.title')</h1>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-5">
            <a href="{{ route('admin.product.create') }}" class="btn btn-info">@lang('admin.pages.products.btn.new')</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('admin.table.image')</th>
                <th scope="col">@lang('admin.table.name')</th>
                <th scope="col">@lang('admin.table.category')</th>
                <th scope="col">@lang('admin.table.price')</th>
                <th scope="col">@lang('admin.table.status')</th>
                <th scope="col">@lang('admin.table.actions')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $index => $product)
                <tr>
                    <th scope="row">{{$index+1}}.</th>
                    <td>[image]</td>
                    <td><a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-link">{{ $product->name }}</a></td>
                    <td>
                        <a href="{{ route('admin.category.edit', $product->category->id) }}">{{$product->category->name}}</a>
                    </td>
                    <td>{{ format_currency($product->price) }}</td>
                    <td>
                        <div class="d-flex">
                            <!-- TODO ajax update -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" @if($product->status == "on") checked @endif role="switch" id="product-status" name="status">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.product.edit', $product) }}" class="btn btn-primary m-2" title="@lang('admin.btn.edit')"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.product.destroy', $product->id) }}">
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
    </div>
@endsection
