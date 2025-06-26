@extends('main-layout') 

@section('body')
<div class="container">
    <h1>Food List</h1>
    <a href="{{ route('admin.foods.create') }}" class="btn btn-primary mb-3">Add Food</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stars</th>
                <th>Thumbnail Photo</th>
                <th>Description</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($foods as $food)
            <tr>
                <td>{{ $food->id }}</td>
                <td>{{ $food->name }}</td>
                <td>{{ $food->category->title ?? 'N/A' }}</td>
                <td>{{ $food->stars }}</td>
                <td>{{ $food->price }}</td>
                <td>
                    @if($food->img)
                        <img src="{{ asset('storage/'.$food->img) }}" width="60">
                    @endif
                </td>
                <td>{{ $food->description }}</td>
                <td>{{ $food->created_at }}</td>
                <td>{{ $food->updated_at }}</td>
                <td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
