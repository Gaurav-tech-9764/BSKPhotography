@extends('layouts.app')

@section('title', 'Services - ' . ($siteSettings['site_name'] ?? 'BSK Photography'))

@section('content')

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Our Services</h1>
        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Services</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <span class="subtitle">What We Offer</span>
            <h2>Tailored Photography Experiences</h2>
            <p>Each service is crafted to deliver exceptional results that exceed your expectations.</p>
        </div>
        <div class="row g-4">
            @forelse($services as $service)
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
                            <p class="card-text">{!! nl2br(e($service->description)) !!}</p>
                            @if($service->price)
                                <div class="mt-3 pt-3" style="border-top: 1px solid var(--border-light);">
                                    <span style="color: var(--accent); font-weight: 700; font-size: 1.1rem; font-family: var(--font-accent);">
                                        {{ $service->price_label ?? 'Starting from' }} &#x20B9;{{ number_format($service->price) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div style="background: var(--bg-cream); width: 80px; height: 80px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 16px;">
                        <i class="bi bi-briefcase fs-2" style="color: var(--text-muted-clr);"></i>
                    </div>
                    <p class="mt-2" style="color: var(--text-muted-clr);">No services available yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section section-cream">
    <div class="container" data-aos="fade-up">
        <div class="cta-section">
            <h2 class="cta-heading" style="position: relative; z-index: 1;">Interested In Our Services?</h2>
            <p class="mt-3" style="color: rgba(250,249,246,0.6); font-size: 1.1rem; position: relative; z-index: 1;">Contact us to discuss your photography needs and get a custom quote.</p>
            <a href="{{ route('contact') }}" class="btn btn-accent mt-3" style="position: relative; z-index: 1;">Contact Us <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

@endsection
