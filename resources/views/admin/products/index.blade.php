@extends('main-layout') 

@section('body')
<div class="container">
    <h1>product List</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add product</a>
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
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->title ?? 'N/A' }}</td>
                <td>{{ $product->stars }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    @if($product->img)
                        <img src="{{ asset('storage/'.$product->img) }}" width="60">
                    @endif
                </td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
