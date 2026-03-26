@extends('layouts.admin')
@section('page-title', 'Edit Blog Post')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 800px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.blog.update', $blog) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Title *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $blog->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Excerpt</label>
                <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $blog->excerpt) }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Content *</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10" required>{{ old('content', $blog->content) }}</textarea>
                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            @if($blog->featured_image)
            <div class="mb-3">
                <label class="form-label fw-semibold">Current Image</label>
                <div><img src="{{ asset('storage/' . $blog->featured_image) }}" class="img-thumbnail" style="max-height:200px;"></div>
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label fw-semibold">{{ $blog->featured_image ? 'Replace Image' : 'Featured Image' }}</label>
                <input type="file" name="featured_image" class="form-control" accept="image/*">
            </div>
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_published" value="0">
                        <input class="form-check-input" type="checkbox" name="is_published" value="1" id="isPublished" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isPublished">Published</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update Post</button>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
