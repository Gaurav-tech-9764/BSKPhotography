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
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title ?? 'About' }}" class="img-fluid rounded-3 shadow-lg" style="max-height: 600px; object-fit: cover; width: 100%;">
                    @else
                        <div class="d-flex align-items-center justify-content-center rounded-3" style="height:400px;background:#222;">
                            <i class="bi bi-person fs-1 text-muted"></i>
                        </div>
                    @endif
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    @if($about->title)
                        <h2 style="font-weight: 700; letter-spacing: 2px; margin-bottom: 20px;">{{ $about->title }}</h2>
                    @endif

                    @if($about->content)
                        <div class="mb-4" style="color: #ccc; line-height: 1.8;">
                            {!! nl2br(e($about->content)) !!}
                        </div>
                    @endif

                    @if($about->experience)
                        <div class="mb-4 p-4 rounded-3" style="background: rgba(212,165,116,0.1); border-left: 4px solid #d4a574;">
                            <h5 style="color: #d4a574; font-weight: 600;">Experience</h5>
                            <p class="mb-0" style="color: #ccc;">{{ $about->experience }}</p>
                        </div>
                    @endif

                    @if($about->achievements)
                        <div class="mb-4">
                            <h5 style="color: #d4a574; font-weight: 600;">Achievements</h5>
                            <div style="color: #ccc;">{!! nl2br(e($about->achievements)) !!}</div>
                        </div>
                    @endif
                </div>
            </div>

            @if($about->story)
                <div class="row mt-5">
                    <div class="col-lg-10 mx-auto" data-aos="fade-up">
                        <h3 class="text-center mb-4" style="font-weight: 700; letter-spacing: 2px;">My Story</h3>
                        <div style="color: #ccc; line-height: 2; text-align: justify;">
                            {!! nl2br(e($about->story)) !!}
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <i class="bi bi-person fs-1 text-muted"></i>
                <p class="mt-3 text-muted">About content coming soon.</p>
            </div>
        @endif
    </div>
</section>

@endsection
