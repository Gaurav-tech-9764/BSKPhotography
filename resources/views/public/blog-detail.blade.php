@extends('layouts.app')

@section('title', $post->title . ' - ' . ($siteSettings['site_name'] ?? 'BSK Photography'))

@section('content')

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">{{ $post->title }}</h1>
        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($post->title, 30) }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto" data-aos="fade-up">
                @if($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="img-fluid rounded-3 mb-4 w-100" style="max-height:500px;object-fit:cover;">
                @endif

                <div class="mb-4">
                    <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{ $post->published_at?->format('F d, Y') }}</small>
                </div>

                <article style="color: #ccc; line-height: 2; font-size: 1.05rem;">
                    {!! nl2br(e($post->content)) !!}
                </article>

                <!-- Recent Posts -->
                @if($recentPosts->count())
                    <hr style="border-color: rgba(255,255,255,0.1); margin: 50px 0;">
                    <h4 style="font-weight: 700; letter-spacing: 1px;">More Stories</h4>
                    <div class="row g-4 mt-3">
                        @foreach($recentPosts as $recent)
                            <div class="col-md-4 col-6">
                                <a href="{{ route('blog.show', $recent->slug) }}" class="text-decoration-none">
                                    <div class="custom-card">
                                        @if($recent->featured_image)
                                            <img src="{{ asset('storage/' . $recent->featured_image) }}" class="card-img-top" alt="{{ $recent->title }}" style="height:180px;" loading="lazy">
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title">{{ Str::limit($recent->title, 50) }}</h6>
                                            <small class="text-muted">{{ $recent->published_at?->format('M d, Y') }}</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
