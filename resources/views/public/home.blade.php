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
                            <a href="{{ $banner->link }}" class="btn btn-gold mt-4">Explore</a>
                        @else
                            <a href="{{ route('portfolio') }}" class="btn btn-gold mt-4">View Portfolio</a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="swiper-slide" style="background: linear-gradient(135deg, #1a1a1a, #333);">
                    <div class="hero-content">
                        <h1>{{ $siteSettings['site_name'] ?? 'BSK Photography' }}</h1>
                        <p>{{ $siteSettings['site_tagline'] ?? 'Capturing Moments That Last Forever' }}</p>
                        <a href="{{ route('portfolio') }}" class="btn btn-gold mt-4">View Portfolio</a>
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
        <div class="section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>A glimpse into our finest work</p>
        </div>

        <!-- Category Tabs -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5" data-aos="fade-up" data-aos-delay="100">
            @foreach($categories->take(6) as $cat)
                <a href="{{ route('portfolio.category', $cat->slug) }}" class="filter-btn">{{ $cat->name }}</a>
            @endforeach
            <a href="{{ route('portfolio') }}" class="filter-btn">View All</a>
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
            <a href="{{ route('portfolio') }}" class="btn btn-outline-gold">View Full Portfolio</a>
        </div>
    </div>
</section>
@endif

<!-- Services -->
@if($services->count())
<section class="section" style="background: rgba(0,0,0,0.3);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>What we offer</p>
        </div>
        <div class="row g-4">
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="custom-card h-100">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->title }}" loading="lazy">
                        @else
                            <div class="card-img-top bg-dark d-flex align-items-center justify-content-center" style="height:250px;">
                                <i class="bi bi-camera fs-1 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($service->description), 120) }}</p>
                            @if($service->price)
                                <p class="mt-2 mb-0" style="color: #d4a574; font-weight: 600;">
                                    {{ $service->price_label ?? 'Starting from' }} ₹{{ number_format($service->price) }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('services') }}" class="btn btn-outline-gold">All Services</a>
        </div>
    </div>
</section>
@endif

<!-- Testimonials -->
@if($testimonials->count())
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            <p>What our clients say</p>
        </div>
        <div class="swiper testimonialSwiper" data-aos="fade-up">
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-card">
                            @if($testimonial->client_image)
                                <img src="{{ asset('storage/' . $testimonial->client_image) }}" alt="{{ $testimonial->client_name }}">
                            @else
                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width:80px;height:80px;background:#d4a574;color:#1a1a1a;font-size:2rem;font-weight:700;">
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
<section class="section" style="background: rgba(0,0,0,0.3);">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Blog & Stories</h2>
            <p>Behind the lens</p>
        </div>
        <div class="row g-4">
            @foreach($recentPosts as $post)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="custom-card h-100">
                        @if($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" loading="lazy">
                        @endif
                        <div class="card-body">
                            <small class="text-muted">{{ $post->published_at?->format('M d, Y') }}</small>
                            <h5 class="card-title mt-2">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 100) }}</p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-outline-gold mt-2">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="section text-center" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8));">
    <div class="container" data-aos="fade-up">
        <h2 class="cta-heading" style="font-weight: 700; letter-spacing: 3px;">LET'S CREATE SOMETHING BEAUTIFUL</h2>
        <p class="mt-3" style="color: #888; font-size: 1.1rem;">Ready to capture your special moments?</p>
        <a href="{{ route('contact') }}" class="btn btn-gold mt-4">Get In Touch</a>
    </div>
</section>

@endsection

@push('scripts')
<script>
    new Swiper('.heroSwiper', {
        loop: true,
        autoplay: { delay: 5000, disableOnInteraction: false },
        effect: 'fade',
        fadeEffect: { crossFade: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        pagination: { el: '.heroSwiper .swiper-pagination', clickable: true },
    });

    new Swiper('.testimonialSwiper', {
        loop: true,
        autoplay: { delay: 4000 },
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: { el: '.testimonialSwiper .swiper-pagination', clickable: true },
        breakpoints: {
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        }
    });
</script>
@endpush
