@extends('layouts.admin')
@section('page-title', 'Edit Service')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 700px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Title *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $service->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" class="form-control" rows="5">{{ old('description', $service->description) }}</textarea>
            </div>
            @if($service->image)
            <div class="mb-3">
                <label class="form-label fw-semibold">Current Image</label>
                <div><img src="{{ asset('storage/' . $service->image) }}" class="img-thumbnail" style="max-height:200px;"></div>
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label fw-semibold">Replace Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $service->sort_order) }}" min="0">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">Active</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update Service</button>
                <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
