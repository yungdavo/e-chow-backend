@extends('main-layout')

@section('body')
<div class="container">
    <h1>Add New Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.products.form', ['buttonText' => 'Create', 'product' => new \App\Models\Product])
    </form>
</div>
@endsection
