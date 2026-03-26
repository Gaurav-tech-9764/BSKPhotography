@extends('layouts.app')

@section('title', 'Events - ' . ($siteSettings['site_name'] ?? 'BSK Photography'))

@section('content')

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Events</h1>
        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Events</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row g-4">
            @forelse($events as $event)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ route('events.show', $event->slug) }}" class="text-decoration-none">
                        <div class="custom-card h-100">
                            @if($event->cover_image)
                                <img src="{{ asset('storage/' . $event->cover_image) }}" class="card-img-top" alt="{{ $event->title }}" loading="lazy">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center" style="height:250px;background:#222;">
                                    <i class="bi bi-calendar-event fs-1 text-muted"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <div class="d-flex gap-3 mb-2">
                                    @if($event->event_date)
                                        <small style="color: #d4a574;"><i class="bi bi-calendar3 me-1"></i>{{ $event->event_date->format('M d, Y') }}</small>
                                    @endif
                                    @if($event->location)
                                        <small class="text-muted"><i class="bi bi-geo-alt me-1"></i>{{ $event->location }}</small>
                                    @endif
                                </div>
                                <p class="card-text">{{ Str::limit(strip_tags($event->description), 100) }}</p>
                                <small class="text-muted"><i class="bi bi-images me-1"></i>{{ $event->images_count }} Photos</small>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-calendar-event fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">No events yet.</p>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $events->links() }}
        </div>
    </div>
</section>

@endsection
