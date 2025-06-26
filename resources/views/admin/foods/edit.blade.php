@extends('main-layout')

@section('body')
<div class="container">
    <h1>Edit Food</h1>

    <form action="{{ route('admin.foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.foods.form', ['buttonText' => 'Update'])
    </form>
</div>
@endsection
