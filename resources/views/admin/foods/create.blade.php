@extends('main-layout')

@section('body')
<div class="container">
    <h1>Add New Food</h1>

    <form action="{{ route('admin.foods.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.foods.form', ['buttonText' => 'Create', 'food' => new \App\Models\Food])
    </form>
</div>
@endsection
