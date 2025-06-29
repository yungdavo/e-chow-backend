{{-- Shared form fields --}}

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="product_category_id" class="form-label">Category</label>
    <select name="product_category_id" class="form-control" required>
        @foreach($categories as $parent)
            <option value="{{ $parent->id }}" {{ old('product_category_id') == $parent->id ? 'selected' : '' }}>
                {{ $parent->title }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
</div>


<div class="mb-3">
    <label for="stars" class="form-label">Stars (1-5)</label>
    <input type="number" name="stars" class="form-control" min="1" max="5" value="{{ old('stars', $product->stars ?? '') }}" required>
</div>



<div class="mb-3">
    <label for="image" class="form-label">Thumbnail Photo</label>
    @if (!empty($product->image))
        <div>
            <img src="{{ asset('storage/' . $product->image) }}" width="80" class="mb-2">
        </div>
    @endif
    <input type="file" name="image" class="form-control">
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">{{ $buttonText }}</button>

<a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>