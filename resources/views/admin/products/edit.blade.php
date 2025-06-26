@extends('main-layout')

@section('body')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.products.form', ['buttonText' => 'Update'])
    </form>
</div>
@endsection
