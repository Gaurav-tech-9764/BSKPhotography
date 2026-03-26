@extends('layouts.admin')
@section('page-title', 'Edit Testimonial')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 700px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Client Name *</label>
                <input type="text" name="client_name" class="form-control @error('client_name') is-invalid @enderror" value="{{ old('client_name', $testimonial->client_name) }}" required>
                @error('client_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Designation</label>
                <input type="text" name="designation" class="form-control" value="{{ old('designation', $testimonial->designation) }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Testimonial *</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="4" required>{{ old('content', $testimonial->content) }}</textarea>
                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Rating *</label>
                <select name="rating" class="form-select" required>
                    @for($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>
            @if($testimonial->client_image)
            <div class="mb-3">
                <label class="form-label fw-semibold">Current Photo</label>
                <div><img src="{{ asset('storage/' . $testimonial->client_image) }}" class="rounded-circle" style="width:80px;height:80px;object-fit:cover;"></div>
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label fw-semibold">{{ $testimonial->client_image ? 'Replace Photo' : 'Client Photo' }}</label>
                <input type="file" name="client_image" class="form-control" accept="image/*">
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $testimonial->sort_order) }}" min="0">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">Active</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update</button>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
