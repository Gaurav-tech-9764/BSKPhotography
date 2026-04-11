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
                <div class="section-title mb-4">
                    <span class="subtitle">Reach Out</span>
                    <h2>Get In Touch</h2>
                    <p>Have a question or want to book a session? We'd love to hear from you.</p>
                </div>

                <div class="mb-4">
                    @if(!empty($siteSettings['site_email']))
                        <div class="d-flex align-items-start gap-3 mb-4 p-3" style="background: var(--bg-white); border: 1px solid var(--border-light); border-radius: var(--radius-md);">
                            <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:48px;height:48px;background:var(--accent-subtle);color:var(--accent);">
                                <i class="bi bi-envelope fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-1" style="color: var(--text-dark); font-family: var(--font-accent); font-weight: 600;">Email</h6>
                                <p class="mb-0" style="color: var(--text-body);">{{ $siteSettings['site_email'] }}</p>
                            </div>
                        </div>
                    @endif

                    @if(!empty($siteSettings['site_phone']))
                        <div class="d-flex align-items-start gap-3 mb-4 p-3" style="background: var(--bg-white); border: 1px solid var(--border-light); border-radius: var(--radius-md);">
                            <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:48px;height:48px;background:var(--accent-subtle);color:var(--accent);">
                                <i class="bi bi-phone fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-1" style="color: var(--text-dark); font-family: var(--font-accent); font-weight: 600;">Phone</h6>
                                <p class="mb-0" style="color: var(--text-body);">{{ $siteSettings['site_phone'] }}</p>
                            </div>
                        </div>
                    @endif

                    @if(!empty($siteSettings['site_address']))
                        <div class="d-flex align-items-start gap-3 mb-4 p-3" style="background: var(--bg-white); border: 1px solid var(--border-light); border-radius: var(--radius-md);">
                            <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width:48px;height:48px;background:var(--accent-subtle);color:var(--accent);">
                                <i class="bi bi-geo-alt fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-1" style="color: var(--text-dark); font-family: var(--font-accent); font-weight: 600;">Address</h6>
                                <p class="mb-0" style="color: var(--text-body);">{{ $siteSettings['site_address'] }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Social Links -->
                @if($socialLinks->count())
                    <div>
                        <h6 class="mb-3" style="color: var(--accent); font-family: var(--font-accent); font-weight: 600; letter-spacing: 0.5px;">Follow Us</h6>
                        <div class="d-flex gap-2">
                            @foreach($socialLinks as $link)
                                <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" title="{{ $link->platform }}"
                                   style="display:inline-flex;align-items:center;justify-content:center;width:42px;height:42px;border-radius:50%;border:1px solid var(--border-light);color:var(--text-body);transition:all 0.3s;font-size:0.9rem;">
                                    <i class="bi bi-{{ $link->icon }}"></i>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="p-4 p-lg-5" style="background: var(--bg-white); border: 1px solid var(--border-light); border-radius: var(--radius-lg);">
                    @if(session('success'))
                        <div class="alert d-flex align-items-center mb-4" style="background:rgba(34,197,94,0.08);border:1px solid rgba(34,197,94,0.2);color:#16a34a;border-radius:var(--radius-md);">
                            <i class="bi bi-check-circle-fill me-3 fs-5"></i>
                            <div>{{ session('success') }}</div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert mb-4" style="background:rgba(239,68,68,0.08);border:1px solid rgba(239,68,68,0.2);color:#dc2626;border-radius:var(--radius-md);">
                            {{ session('error') }}
                        </div>
                    @endif

                    <h5 style="font-family: var(--font-display); color: var(--text-dark); margin-bottom: 24px;">Send Us a Message</h5>

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-medium" style="color: var(--text-dark);">Your Name *</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required
                                    style="background:var(--bg-primary);border-color:var(--border-light);color:var(--text-dark);padding:12px 16px;border-radius:var(--radius-sm);font-size:0.92rem;"
                                    placeholder="John Doe">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-medium" style="color: var(--text-dark);">Your Email *</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                                    style="background:var(--bg-primary);border-color:var(--border-light);color:var(--text-dark);padding:12px 16px;border-radius:var(--radius-sm);font-size:0.92rem;"
                                    placeholder="john@example.com">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-medium" style="color: var(--text-dark);">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                    style="background:var(--bg-primary);border-color:var(--border-light);color:var(--text-dark);padding:12px 16px;border-radius:var(--radius-sm);font-size:0.92rem;"
                                    placeholder="+91 98765 43210">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-medium" style="color: var(--text-dark);">Subject</label>
                                <input type="text" name="subject" class="form-control" value="{{ old('subject') }}"
                                    style="background:var(--bg-primary);border-color:var(--border-light);color:var(--text-dark);padding:12px 16px;border-radius:var(--radius-sm);font-size:0.92rem;"
                                    placeholder="Wedding Photography">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-medium" style="color: var(--text-dark);">Message *</label>
                                <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" required
                                    style="background:var(--bg-primary);border-color:var(--border-light);color:var(--text-dark);padding:12px 16px;border-radius:var(--radius-sm);font-size:0.92rem;"
                                    placeholder="Tell us about your vision...">{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-accent w-100 w-md-auto">
                                    <i class="bi bi-send me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
