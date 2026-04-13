@extends('layouts.app')

@section('title', 'Blog - ' . ($siteSettings['site_name'] ?? 'BSK Photography'))

@section('content')

<div class="page-header">
    <div class="container">
        <h1>Blog & Stories</h1>
        <nav aria-label="breadcrumb">
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
                                <div class="card-img-top d-flex align-items-center justify-content-center" style="height:250px;background:var(--bg-cream);">
                                    <i class="bi bi-journal-richtext fs-1" style="color: var(--text-muted-clr);"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span style="background: var(--accent-subtle); color: var(--accent); padding: 3px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 600;">Blog</span>
                                    <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $post->published_at?->format('M d, Y') }}</small>
                                </div>
                                <h5 class="card-title mt-1">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 120) }}</p>
                                <span style="color: var(--accent); font-size: 0.88rem; font-weight: 600; font-family: var(--font-accent);">Read More <i class="bi bi-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div style="background: var(--bg-cream); width: 80px; height: 80px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 16px;">
                        <i class="bi bi-journal-richtext fs-2" style="color: var(--text-muted-clr);"></i>
                    </div>
                    <p class="mt-2" style="color: var(--text-muted-clr);">No blog posts yet.</p>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $posts->links() }}
        </div>
    </div>
</section>

@endsection
