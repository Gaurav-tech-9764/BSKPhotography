@extends('layouts.admin')
@section('page-title', 'Edit About Page')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 750px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Title *</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $about->title ?? '') }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Content *</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="8">{{ old('content', $about->content ?? '') }}</textarea>
                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Experience</label>
                <input type="text" name="experience" class="form-control" value="{{ old('experience', $about->experience ?? '') }}" placeholder="e.g. 10+ Years">
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Achievements</label>
                <textarea name="achievements" class="form-control" rows="3">{{ old('achievements', $about->achievements ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Our Story</label>
                <textarea name="story" class="form-control" rows="5">{{ old('story', $about->story ?? '') }}</textarea>
            </div>
            @if(!empty($about->image))
            <div class="mb-3">
                <label class="form-label fw-semibold">Current Image</label>
                <div><img src="{{ asset('storage/' . $about->image) }}" class="img-thumbnail" style="max-height:200px;"></div>
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label fw-semibold">{{ !empty($about->image) ? 'Replace Image' : 'Profile Image' }}</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Save Changes</button>
        </form>
    </div>
</div>
@endsection
