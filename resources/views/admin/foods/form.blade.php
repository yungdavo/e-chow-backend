<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $food->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Category</label>
    <select name="category_id" class="form-control" required>
        @foreach($categories as $id => $title)
            <option value="{{ $id }}" {{ (old('category_id', $food->category_id ?? '') == $id) ? 'selected' : '' }}>
                {{ $title }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $food->price ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="location" class="form-label">Location</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $food->location ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="stars" class="form-label">Stars (1-5)</label>
    <input type="number" name="stars" class="form-control" min="1" max="5" value="{{ old('stars', $food->stars ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="people" class="form-label">People</label>
    <input type="number" name="people" class="form-control" value="{{ old('people', $food->people ?? '') }}">
</div>

<div class="mb-3">
    <label for="selected_people" class="form-label">Selected People</label>
    <input type="number" name="selected_people" class="form-control" value="{{ old('selected_people', $food->selected_people ?? '') }}">
</div>

<div class="mb-3">
    <label for="img" class="form-label">Thumbnail Photo</label>
    @if (!empty($food->img))
        <div>
            <img src="{{ asset('storage/' . $food->img) }}" width="80" class="mb-2">
        </div>
    @endif
    <input type="file" name="img" class="form-control">
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $food->description ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">{{ $buttonText }}</button>

<a href="{{ route('admin.foods.index') }}" class="btn btn-secondary">Cancel</a>