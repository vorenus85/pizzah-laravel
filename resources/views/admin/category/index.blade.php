@extends('layouts.admin')

@section('title')
    <h1 class="mb-5">Kategóriák</h1>
@endsection

@section('content')
    <div class="d-flex justify-content-end mb-5">
        <a href="{{ route('admin.category.create') }}" class="btn btn-info">Új kategória</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kép</th>
            <th scope="col">Név</th>
            <th scope="col">Státusz</th>
            <th scope="col">Műveletek</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $index => $category)
            <tr>
                <th scope="row">{{$index+1}}.</th>
                <td>[image]</td>
                <td>{{ $category->name }}</td>
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
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Biztosan törlöd?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-2" title="Törlés"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
