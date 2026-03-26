@extends('layouts.app')

@section('title', 'Portfolio - ' . ($siteSettings['site_name'] ?? 'BSK Photography'))

@section('content')

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Portfolio</h1>
        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Portfolio</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <!-- Category Filter -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="filter-btn {{ $activeCategory === 'all' ? 'active' : '' }}">All</a>
            @foreach($categories as $cat)
                <a href="{{ route('portfolio.category', $cat->slug) }}" class="filter-btn {{ $activeCategory === $cat->slug ? 'active' : '' }}">{{ $cat->name }}</a>
            @endforeach
        </div>

        <!-- Gallery Grid -->
        <div class="gallery-grid" data-aos="fade-up" data-aos-delay="100">
            @forelse($images as $image)
                <div class="gallery-item">
                    <a href="{{ asset('storage/' . $image->image_path) }}" data-lightbox="gallery" data-title="{{ $image->title ?? $image->category->name ?? '' }}">
                        <img src="{{ asset('storage/' . ($image->thumbnail_path ?? $image->image_path)) }}" alt="{{ $image->title ?? 'Photo' }}" class="protected-image" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="text-center">
                                <i class="bi bi-zoom-in"></i>
                                @if($image->title)
                                    <p class="mt-2 mb-0 text-white small">{{ $image->title }}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="text-center py-5 w-100">
                    <i class="bi bi-images fs-1" style="color: #555;"></i>
                    <p class="mt-3" style="color: #aaa;">No images found in this category.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($images->hasPages())
        <div class="mt-5 d-flex justify-content-center">
            <nav aria-label="Portfolio pagination">
                {{ $images->links() }}
            </nav>
        </div>
        @endif
    </div>
</section>

@endsection
