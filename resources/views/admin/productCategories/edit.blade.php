@extends('main-layout')

@section('body')
<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Please fix the following issues:<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h1 class="mb-4">Edit Product Category</h1>

    <form action="{{ route('admin.productCategories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Category Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $category->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Category</label>
            <select name="parent_id" id="parent_id" class="form-select">
                <option value="">-- None (Top Level) --</option>
                @foreach($categories as $parent)
                    <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                        {{ $parent->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Category</button>
        <a href="{{ route('admin.productCategories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
