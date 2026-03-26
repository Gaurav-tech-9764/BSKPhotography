@extends('layouts.app')

@section('title', 'Contact - ' . ($siteSettings['site_name'] ?? 'BSK Photography'))

@section('content')

<div class="page-header">
    <div class="container">
        <h1 data-aos="fade-up">Contact Us</h1>
        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="100">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Info -->
            <div class="col-lg-5" data-aos="fade-right">
                <h3 style="font-weight: 700; letter-spacing: 2px; margin-bottom: 30px; color: #fff;">Get In Touch</h3>
                <p style="color: #aaa;" class="mb-4">Have a question or want to book a session? Reach out to us and we'll get back to you as soon as possible.</p>

                <div class="mb-4">
                    @if(!empty($siteSettings['site_email']))
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle" style="width:45px;height:45px;background:rgba(212,165,116,0.15);color:#d4a574;flex-shrink:0;">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div>
                                <h6 class="mb-1" style="color: #fff;">Email</h6>
                                <p class="mb-0" style="color: #bbb;">{{ $siteSettings['site_email'] }}</p>
                            </div>
                        </div>
                    @endif

                    @if(!empty($siteSettings['site_phone']))
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle" style="width:45px;height:45px;background:rgba(212,165,116,0.15);color:#d4a574;flex-shrink:0;">
                                <i class="bi bi-phone"></i>
                            </div>
                            <div>
                                <h6 class="mb-1" style="color: #fff;">Phone</h6>
                                <p class="mb-0" style="color: #bbb;">{{ $siteSettings['site_phone'] }}</p>
                            </div>
                        </div>
                    @endif

                    @if(!empty($siteSettings['site_address']))
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle" style="width:45px;height:45px;background:rgba(212,165,116,0.15);color:#d4a574;flex-shrink:0;">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <h6 class="mb-1" style="color: #fff;">Address</h6>
                                <p class="mb-0" style="color: #bbb;">{{ $siteSettings['site_address'] }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Social Links -->
                @if($socialLinks->count())
                    <h6 class="mb-3" style="color: #d4a574;">Follow Us</h6>
                    <div class="footer-social">
                        @foreach($socialLinks as $link)
                            <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" title="{{ $link->platform }}">
                                <i class="bi bi-{{ $link->icon }}"></i>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7" data-aos="fade-left">
                @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center" style="background:rgba(40,167,69,0.15);border-color:rgba(40,167,69,0.3);color:#5cb85c;border-radius:12px;">
                        <i class="bi bi-check-circle-fill me-3 fs-4"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" style="background:rgba(220,53,69,0.15);border-color:rgba(220,53,69,0.3);color:#ff6b6b;border-radius:12px;">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small" style="color: #ccc;">Your Name *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required
                                style="background:rgba(255,255,255,0.05);border-color:rgba(255,255,255,0.15);color:#fff;padding:12px;border-radius:10px;">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small" style="color: #ccc;">Your Email *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                                style="background:rgba(255,255,255,0.05);border-color:rgba(255,255,255,0.15);color:#fff;padding:12px;border-radius:10px;">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small" style="color: #ccc;">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                style="background:rgba(255,255,255,0.05);border-color:rgba(255,255,255,0.15);color:#fff;padding:12px;border-radius:10px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small" style="color: #ccc;">Subject</label>
                            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}"
                                style="background:rgba(255,255,255,0.05);border-color:rgba(255,255,255,0.15);color:#fff;padding:12px;border-radius:10px;">
                        </div>
                        <div class="col-12">
                            <label class="form-label small" style="color: #ccc;">Message *</label>
                            <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" required
                                style="background:rgba(255,255,255,0.05);border-color:rgba(255,255,255,0.15);color:#fff;padding:12px;border-radius:10px;">{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-gold w-100 w-md-auto">
                                <i class="bi bi-send me-2"></i>Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
