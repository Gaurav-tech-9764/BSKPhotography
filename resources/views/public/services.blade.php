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
        <div class="row g-4">
            @forelse($services as $service)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="custom-card h-100">
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->title }}" loading="lazy">
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center" style="height:250px;background:#222;">
                                <i class="bi bi-camera fs-1 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->title }}</h5>
                            <p class="card-text">{!! nl2br(e($service->description)) !!}</p>
                            @if($service->price)
                                <div class="mt-3 pt-3" style="border-top: 1px solid rgba(255,255,255,0.1);">
                                    <span style="color: #d4a574; font-weight: 600; font-size: 1.1rem;">
                                        {{ $service->price_label ?? 'Starting from' }} ₹{{ number_format($service->price) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-briefcase fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">No services available yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section text-center" style="background: rgba(0,0,0,0.3);">
    <div class="container" data-aos="fade-up">
        <h3 style="font-weight: 700; letter-spacing: 2px;">INTERESTED IN OUR SERVICES?</h3>
        <p class="mt-3" style="color: #888;">Contact us to discuss your photography needs.</p>
        <a href="{{ route('contact') }}" class="btn btn-gold mt-3">Contact Us</a>
    </div>
</section>

@endsection
