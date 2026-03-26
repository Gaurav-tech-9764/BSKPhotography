@extends('layouts.admin')
@section('page-title', 'Edit Image')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 700px;">
    <div class="card-body p-4">
        <div class="mb-3 text-center">
            <img src="{{ asset('storage/' . $portfolio->image_path) }}" class="img-thumbnail" style="max-height:300px;">
        </div>
        <form action="{{ route('admin.portfolio.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Category *</label>
                <select name="category_id" class="form-select" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $portfolio->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $portfolio->title) }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $portfolio->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Replace Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <div class="form-check form-switch">
                    <input type="hidden" name="is_featured" value="0">
                    <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="isFeatured" {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isFeatured">Featured</label>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update</button>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
