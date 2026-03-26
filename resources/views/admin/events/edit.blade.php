@extends('layouts.admin')
@section('page-title', 'Edit Event')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 750px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Title *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $event->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Event Date</label>
                    <input type="date" name="event_date" class="form-control" value="{{ old('event_date', $event->event_date?->format('Y-m-d')) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $event->location) }}">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $event->description) }}</textarea>
            </div>
            @if($event->cover_image)
            <div class="mb-3">
                <label class="form-label fw-semibold">Current Cover Image</label>
                <div><img src="{{ asset('storage/' . $event->cover_image) }}" class="img-thumbnail" style="max-height:200px;"></div>
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label fw-semibold">Replace Cover Image</label>
                <input type="file" name="cover_image" class="form-control" accept="image/*">
            </div>
            @if($event->images && $event->images->count())
            <div class="mb-3">
                <label class="form-label fw-semibold">Gallery Images</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($event->images as $img)
                        <div class="position-relative" style="width:100px;">
                            <img src="{{ asset('storage/' . $img->image_path) }}" class="img-thumbnail w-100">
                            <form action="{{ route('admin.events.delete-image', $img) }}" method="POST" class="position-absolute top-0 end-0" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" style="padding:1px 5px; font-size:10px;"><i class="bi bi-x"></i></button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label fw-semibold">Add More Gallery Images</label>
                <input type="file" name="gallery_images[]" class="form-control" accept="image/*" multiple>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $event->sort_order) }}" min="0">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="isActive" {{ old('is_active', $event->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">Active</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Update Event</button>
                <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
