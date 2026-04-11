@extends('layouts.app')

@section('title', 'About - ' . ($siteSettings['site_name'] ?? 'BSK Photography'))

@section('content')

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">About Me</h1>
        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">About</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        @if($about)
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    @if($about->image)
                        <div style="position: relative;">
                            <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title ?? 'About' }}" class="img-fluid shadow-lg" style="max-height: 600px; object-fit: cover; width: 100%; border-radius: var(--radius-lg);">
                            <div style="position: absolute; bottom: -15px; right: -15px; width: 120px; height: 120px; background: var(--accent); border-radius: var(--radius-md); z-index: -1;"></div>
                        </div>
                    @else
                        <div class="d-flex align-items-center justify-content-center" style="height:400px;background:var(--bg-cream);border-radius: var(--radius-lg);">
                            <i class="bi bi-person fs-1" style="color: var(--text-muted-clr);"></i>
                        </div>
                    @endif
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="section-title mb-4">
                        <span class="subtitle">My Journey</span>
                        @if($about->title)
                            <h2>{{ $about->title }}</h2>
                        @endif
                    </div>

                    @if($about->content)
                        <div class="mb-4" style="color: var(--text-body); line-height: 1.9;">
                            {!! nl2br(e($about->content)) !!}
                        </div>
                    @endif

                    @if($about->experience)
                        <div class="mb-4 p-4" style="background: var(--accent-subtle); border-left: 4px solid var(--accent); border-radius: 0 var(--radius-md) var(--radius-md) 0;">
                            <h6 style="color: var(--accent); font-weight: 700; font-family: var(--font-accent); letter-spacing: 0.5px; margin-bottom: 8px;">Experience</h6>
                            <p class="mb-0" style="color: var(--text-body);">{{ $about->experience }}</p>
                        </div>
                    @endif

                    @if($about->achievements)
                        <div class="mb-4">
                            <h6 style="color: var(--accent); font-weight: 700; font-family: var(--font-accent); letter-spacing: 0.5px; margin-bottom: 10px;">Achievements</h6>
                            <div style="color: var(--text-body); line-height: 1.9;">{!! nl2br(e($about->achievements)) !!}</div>
                        </div>
                    @endif
                </div>
            </div>

            @if($about->story)
                <div class="row mt-5 pt-4">
                    <div class="col-lg-10 mx-auto" data-aos="fade-up">
                        <div class="p-5" style="background: var(--bg-cream); border-radius: var(--radius-lg);">
                            <div class="section-title text-center mb-4">
                                <span class="subtitle">The Backstory</span>
                                <h2>My Story</h2>
                            </div>
                            <div style="color: var(--text-body); line-height: 2; text-align: justify;">
                                {!! nl2br(e($about->story)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <div style="background: var(--bg-cream); width: 80px; height: 80px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 16px;">
                    <i class="bi bi-person fs-2" style="color: var(--text-muted-clr);"></i>
                </div>
                <p class="mt-2" style="color: var(--text-muted-clr);">About content coming soon.</p>
            </div>
        @endif
    </div>
</section>

@endsection
