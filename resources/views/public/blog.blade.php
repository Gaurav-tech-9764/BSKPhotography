@extends('layouts.app')

@section('title', 'Blog - ' . ($siteSettings['site_name'] ?? 'BSK Photography'))

@section('content')

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Blog & Stories</h1>
        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Blog</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row g-4">
            @forelse($posts as $post)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none">
                        <div class="custom-card h-100">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" loading="lazy">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center" style="height:250px;background:#222;">
                                    <i class="bi bi-journal-richtext fs-1 text-muted"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $post->published_at?->format('M d, Y') }}</small>
                                <h5 class="card-title mt-2">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 120) }}</p>
                                <span style="color: #d4a574; font-size: 0.85rem; font-weight: 600;">Read More <i class="bi bi-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-journal-richtext fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">No blog posts yet.</p>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $posts->links() }}
        </div>
    </div>
</section>

@endsection
