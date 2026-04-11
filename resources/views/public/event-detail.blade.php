@extends('layouts.app')

@section('title', $event->title . ' - ' . ($siteSettings['site_name'] ?? 'BSK Photography'))

@section('content')

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">{{ $event->title }}</h1>
        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('events') }}">Events</a></li>
                <li class="breadcrumb-item active">{{ $event->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                    @if($event->event_date)
                        <span class="d-inline-flex align-items-center gap-2" style="background: var(--accent-subtle); color: var(--accent); padding: 8px 20px; border-radius: 50px; font-size: 0.88rem; font-weight: 600;">
                            <i class="bi bi-calendar3"></i> {{ $event->event_date->format('F d, Y') }}
                        </span>
                    @endif
                    @if($event->location)
                        <span class="d-inline-flex align-items-center gap-2" style="background: var(--bg-cream); color: var(--text-body); padding: 8px 20px; border-radius: 50px; font-size: 0.88rem;">
                            <i class="bi bi-geo-alt"></i> {{ $event->location }}
                        </span>
                    @endif
                </div>
                @if($event->description)
                    <p style="color: var(--text-body); line-height: 1.8; max-width: 700px; margin: 0 auto;">{!! nl2br(e($event->description)) !!}</p>
                @endif
            </div>
        </div>

        <!-- Event Gallery -->
        @if($event->images->count())
            <div class="gallery-grid" data-aos="fade-up">
                @foreach($event->images as $image)
                    <div class="gallery-item">
                        <a href="{{ asset('storage/' . $image->image_path) }}" data-lightbox="event-{{ $event->id }}" data-title="{{ $image->caption ?? $event->title }}">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->caption ?? $event->title }}" class="protected-image" loading="lazy">
                            <div class="gallery-overlay">
                                <i class="bi bi-zoom-in"></i>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <div style="background: var(--bg-cream); width: 80px; height: 80px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 16px;">
                    <i class="bi bi-images fs-2" style="color: var(--text-muted-clr);"></i>
                </div>
                <p class="mt-2" style="color: var(--text-muted-clr);">No photos yet for this event.</p>
            </div>
        @endif
    </div>
</section>

@endsection
