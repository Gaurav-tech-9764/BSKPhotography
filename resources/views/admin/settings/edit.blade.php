@extends('layouts.admin')
@section('page-title', 'Site Settings')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 750px;">
    <div class="card-body p-4">
        <h5 class="mb-4">General Settings</h5>
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Site Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $settings['site_name'] ?? 'BSK Photography') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Tagline</label>
                    <input type="text" name="site_tagline" class="form-control" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Contact Email</label>
                    <input type="email" name="site_email" class="form-control" value="{{ old('site_email', $settings['site_email'] ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Contact Phone</label>
                    <input type="text" name="site_phone" class="form-control" value="{{ old('site_phone', $settings['site_phone'] ?? '') }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Address</label>
                <textarea name="site_address" class="form-control" rows="2">{{ old('site_address', $settings['site_address'] ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Footer Text</label>
                <input type="text" name="footer_text" class="form-control" value="{{ old('footer_text', $settings['footer_text'] ?? '') }}">
            </div>

            <hr class="my-4">
            <h5 class="mb-3">SEO Settings</h5>

            <div class="mb-3">
                <label class="form-label fw-semibold">Meta Description</label>
                <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Meta Keywords</label>
                <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}" placeholder="Comma-separated keywords">
            </div>

            <hr class="my-4">
            <h5 class="mb-3">Branding</h5>

            @if(!empty($settings['site_logo']))
            <div class="mb-3">
                <label class="form-label fw-semibold">Current Logo</label>
                <div><img src="{{ asset('storage/' . $settings['site_logo']) }}" style="max-height:60px;" class="bg-dark p-2 rounded"></div>
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label fw-semibold">{{ !empty($settings['site_logo']) ? 'Replace Logo' : 'Site Logo' }}</label>
                <input type="file" name="site_logo" class="form-control" accept="image/*">
            </div>

            @if(!empty($settings['site_favicon']))
            <div class="mb-3">
                <label class="form-label fw-semibold">Current Favicon</label>
                <div><img src="{{ asset('storage/' . $settings['site_favicon']) }}" style="max-height:32px;"></div>
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label fw-semibold">{{ !empty($settings['site_favicon']) ? 'Replace Favicon' : 'Favicon' }}</label>
                <input type="file" name="site_favicon" class="form-control" accept="image/*">
                <small class="text-muted">Recommended: 32x32 or 64x64 PNG.</small>
            </div>

            <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg me-1"></i> Save Settings</button>
        </form>
    </div>
</div>
@endsection
