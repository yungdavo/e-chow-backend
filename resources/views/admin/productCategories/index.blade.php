<!-- resources/views/admin/productCategories/index.blade.php -->

@extends('main-layout')

@section('body')
<div class="container">
    <h1 class="mb-4">Product Categories</h1>
    <a href="{{ route('admin.productCategories.create') }}" class="btn btn-primary mb-3">Add New Category</a>

    <!-- Nestable Tree -->
    <div class="dd" id="category-nestable">
        <ol class="dd-list">
            @foreach ($categories->where('parent_id', 0)->sortBy('order') as $category)
                <li class="dd-item" data-id="{{ $category->id }}">
                    <div class="dd-handle d-flex justify-content-between align-items-center">
                        <span>{{ $category->title }}</span>
                        <span>
                            <a href="{{ route('admin.productCategories.edit', $category->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                            <form action="{{ route('admin.productCategories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </span>
                    </div>

                    @if ($category->children && $category->children->count())
                        <ol class="dd-list">
                            @foreach ($category->children->sortBy('order') as $child)
                                <li class="dd-item" data-id="{{ $child->id }}">
                                    <div class="dd-handle d-flex justify-content-between align-items-center">
                                        <span>{{ $child->title }}</span>
                                        <span>
                                            <a href="{{ route('admin.productCategories.edit', $child->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                            <form action="{{ route('admin.productCategories.destroy', $child->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>

    <button id="save-order" class="btn btn-success mt-3">Save Order</button>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nestable2@1.6.0/jquery.nestable.min.css">
<style>
    .dd-handle {
        background: #f8f9fa;
        padding: 12px;
        border: 1px solid #dee2e6;
        cursor: move;
        border-radius: 4px;
    }
    .dd-item > .dd-handle {
        margin-bottom: 8px;
    }
</style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/nestable2@1.6.0/jquery.nestable.min.js"></script>
<script>
    $(document).ready(function () {
        $('#category-nestable').nestable();

        $('#save-order').click(function () {
            let order = $('#category-nestable').nestable('serialize');

            $.ajax({
                url: "{{ route('admin.productCategories.reorder') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    order: order
                },
                success: function () {
                    alert('Category order saved successfully.');
                },
                error: function () {
                    alert('An error occurred while saving the order.');
                }
            });
        });
    });
</script>
@endpush
