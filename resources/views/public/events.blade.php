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
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <span class="subtitle">Our Events</span>
            <h2>Moments We've Captured</h2>
            <p>Browse through some of the memorable events we've had the privilege to photograph.</p>
        </div>
        <div class="row g-4">
            @forelse($events as $event)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <a href="{{ route('events.show', $event->slug) }}" class="text-decoration-none">
                        <div class="custom-card h-100">
                            @if($event->cover_image)
                                <img src="{{ asset('storage/' . $event->cover_image) }}" class="card-img-top" alt="{{ $event->title }}" loading="lazy">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center" style="height:250px;background:var(--bg-cream);">
                                    <i class="bi bi-calendar-event fs-1" style="color: var(--text-muted-clr);"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <div class="d-flex flex-wrap gap-3 mb-3">
                                    @if($event->event_date)
                                        <span class="d-inline-flex align-items-center gap-1" style="background: var(--accent-subtle); color: var(--accent); padding: 4px 12px; border-radius: 50px; font-size: 0.78rem; font-weight: 600;">
                                            <i class="bi bi-calendar3"></i> {{ $event->event_date->format('M d, Y') }}
                                        </span>
                                    @endif
                                    @if($event->location)
                                        <span class="d-inline-flex align-items-center gap-1 text-muted" style="font-size: 0.82rem;">
                                            <i class="bi bi-geo-alt"></i> {{ $event->location }}
                                        </span>
                                    @endif
                                </div>
                                <p class="card-text">{{ Str::limit(strip_tags($event->description), 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <small class="text-muted"><i class="bi bi-images me-1"></i>{{ $event->images_count }} Photos</small>
                                    <span style="color: var(--accent); font-size: 0.85rem; font-weight: 600;">View <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div style="background: var(--bg-cream); width: 80px; height: 80px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 16px;">
                        <i class="bi bi-calendar-event fs-2" style="color: var(--text-muted-clr);"></i>
                    </div>
                    <p class="mt-2" style="color: var(--text-muted-clr);">No events yet.</p>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $events->links() }}
        </div>
    </div>
</section>

@endsection
