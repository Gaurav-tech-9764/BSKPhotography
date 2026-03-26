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
                <div class="d-flex justify-content-center gap-4 mb-4">
                    @if($event->event_date)
                        <span style="color: #d4a574;"><i class="bi bi-calendar3 me-2"></i>{{ $event->event_date->format('F d, Y') }}</span>
                    @endif
                    @if($event->location)
                        <span class="text-muted"><i class="bi bi-geo-alt me-2"></i>{{ $event->location }}</span>
                    @endif
                </div>
                @if($event->description)
                    <p class="text-muted">{!! nl2br(e($event->description)) !!}</p>
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
                <i class="bi bi-images fs-1 text-muted"></i>
                <p class="mt-3 text-muted">No photos yet for this event.</p>
            </div>
        @endif
    </div>
</section>

@endsection
