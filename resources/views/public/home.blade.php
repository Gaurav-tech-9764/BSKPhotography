@extends('layouts.app')

@section('title', $siteSettings['site_name'] ?? 'BSK Photography')

@section('content')

<!-- Hero Slider -->
<div class="hero-slider">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">
            @forelse($banners as $banner)
                <div class="swiper-slide" style="background-image: url('{{ asset('storage/' . $banner->image) }}')">
                    <div class="hero-content">
                        @if($banner->title)
                            <h1>{{ $banner->title }}</h1>
                        @endif
                        @if($banner->subtitle)
                            <p>{{ $banner->subtitle }}</p>
                        @endif
                        @if($banner->link)
                            <a href="{{ $banner->link }}" class="btn btn-accent mt-4">Explore</a>
                        @else
                            <a href="{{ route('portfolio') }}" class="btn btn-accent mt-4">View Portfolio</a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="swiper-slide" style="background: linear-gradient(135deg, var(--bg-dark), var(--bg-dark-soft));">
                    <div class="hero-content">
                        <h1>{{ $siteSettings['site_name'] ?? 'BSK Photography' }}</h1>
                        <p>{{ $siteSettings['site_tagline'] ?? 'Capturing Moments That Last Forever' }}</p>
                        <a href="{{ route('portfolio') }}" class="btn btn-accent mt-4">View Portfolio</a>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!-- Featured Portfolio -->
@if($featuredImages->count())
<section class="section">
    <div class="container">
        <div class="row align-items-end mb-5">
            <div class="col-lg-6" data-aos="fade-up">
                <div class="section-title mb-0">
                    <span class="subtitle">Our Work</span>
                    <h2>Featured Portfolio</h2>
                    <p>A curated selection of our finest captures and visual stories.</p>
                </div>
            </div>
            <div class="col-lg-6 text-lg-end mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                <div class="d-flex flex-wrap justify-content-lg-end gap-2">
                    @foreach($categories->take(4) as $cat)
                        <a href="{{ route('portfolio.category', $cat->slug) }}" class="filter-btn">{{ $cat->name }}</a>
                    @endforeach
                    <a href="{{ route('portfolio') }}" class="filter-btn">View All</a>
                </div>
            </div>
        </div>

        <div class="gallery-grid" data-aos="fade-up" data-aos-delay="200">
            @foreach($featuredImages as $image)
                <div class="gallery-item">
                    <a href="{{ asset('storage/' . $image->image_path) }}" data-lightbox="portfolio" data-title="{{ $image->title ?? '' }}">
                        <img src="{{ asset('storage/' . ($image->thumbnail_path ?? $image->image_path)) }}" alt="{{ $image->title ?? 'Portfolio' }}" class="protected-image" loading="lazy">
                        <div class="gallery-overlay">
                            <i class="bi bi-zoom-in"></i>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('portfolio') }}" class="btn btn-outline-accent">Explore Full Portfolio <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>
@endif

<!-- Services -->
@if($services->count())
<section class="section section-cream">
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
            <span class="subtitle">What We Do</span>
            <h2>Our Services</h2>
            <p>From intimate portraits to grand celebrations, we bring your vision to life.</p>
        </div>
        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="custom-card h-100">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->title }}" loading="lazy">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height:250px;background:var(--bg-cream);">
                                <i class="bi bi-camera fs-1" style="color: var(--text-muted-clr);"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($service->description), 120) }}</p>
                            @if($service->price)
                                <p class="mt-2 mb-0" style="color: var(--accent); font-weight: 600;">
                                    {{ $service->price_label ?? 'Starting from' }} &#x20B9;{{ number_format($service->price) }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('services') }}" class="btn btn-outline-accent">All Services <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>
@endif

<!-- Testimonials -->
@if($testimonials->count())
<section class="section">
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
            <span class="subtitle">Client Love</span>
            <h2>What People Say</h2>
            <p>Real stories from the people whose moments we captured.</p>
        </div>
        <div class="swiper testimonialSwiper" data-aos="fade-up">
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            @if($testimonial->client_image)
                                <img src="{{ asset('storage/' . $testimonial->client_image) }}" alt="{{ $testimonial->client_name }}">
                            @else
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width:70px;height:70px;background:var(--accent-subtle);color:var(--accent);font-size:1.6rem;font-weight:700;font-family:var(--font-display);">
                                    {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                                </div>
                            @endif
                            @if($testimonial->rating)
                                <div class="stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="bi {{ $i <= $testimonial->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                    @endfor
                                </div>
                            @endif
                            <p>"{{ $testimonial->content }}"</p>
                            <h5>{{ $testimonial->client_name }}</h5>
                            @if($testimonial->client_designation)
                                <small>{{ $testimonial->client_designation }}</small>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>
@endif

<!-- Recent Blog Posts -->
@if($recentPosts->count())
<section class="section section-cream">
    <div class="container">
        <div class="row align-items-end mb-5">
            <div class="col-lg-6" data-aos="fade-up">
                <div class="section-title mb-0">
                    <span class="subtitle">Stories & Insights</span>
                    <h2>From the Blog</h2>
                    <p>Behind the lens moments and photography insights.</p>
                </div>
            </div>
            <div class="col-lg-6 text-lg-end mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                <a href="{{ route('blog') }}" class="btn btn-outline-accent">View All Posts <i class="bi bi-arrow-right ms-2"></i></a>
            </div>
        </div>
        <div class="row g-4">
            @foreach($recentPosts as $post)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none">
                        <div class="custom-card h-100">
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" loading="lazy">
                            @endif
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span style="background: var(--accent-subtle); color: var(--accent); padding: 3px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 600;">Blog</span>
                                    <small class="text-muted">{{ $post->published_at?->format('M d, Y') }}</small>
                                </div>
                                <h5 class="card-title mt-1">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 100) }}</p>
                                <span style="color: var(--accent); font-size: 0.88rem; font-weight: 600; font-family: var(--font-accent);">Read More <i class="bi bi-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="section">
    <div class="container" data-aos="fade-up">
        <div class="cta-section">
            <h2 class="cta-heading" style="position: relative; z-index: 1;">Let's Create Something Beautiful</h2>
            <p class="mt-3" style="color: rgba(250,249,246,0.6); font-size: 1.1rem; position: relative; z-index: 1;">Ready to capture your special moments? Let's make it happen.</p>
            <a href="{{ route('contact') }}" class="btn btn-accent mt-4" style="position: relative; z-index: 1;">Get In Touch <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

@endsection
