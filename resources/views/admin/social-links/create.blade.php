@extends('layouts.admin')
@section('page-title', 'Add Social Link')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 600px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.social-links.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Platform *</label>
                <input type="text" name="platform" class="form-control @error('platform') is-invalid @enderror" value="{{ old('platform') }}" required placeholder="e.g. Facebook, Instagram, YouTube">
                @error('platform')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">URL *</label>
                <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}" required placeholder="https://">
                @error('url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Bootstrap Icon Name</label>
                <input type="text" name="icon" class="form-control" value="{{ old('icon') }}" placeholder="e.g. facebook, instagram, youtube">
                <small class="text-muted">Enter icon name without 'bi-' prefix. See <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a>.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', 1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">Active</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Create</button>
                <a href="{{ route('admin.social-links.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
