<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $siteSettings['meta_description'] ?? 'Professional Photography Services' }}">
    <meta name="keywords" content="{{ $siteSettings['meta_keywords'] ?? 'photography' }}">
    <title>@yield('title', $siteSettings['site_name'] ?? 'BSK Photography')</title>

    @if(!empty($siteSettings['site_favicon']))
        <link rel="icon" href="{{ asset('storage/' . $siteSettings['site_favicon']) }}">
    @endif

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Raleway:wght@300;400;500;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <!-- Lightbox2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
    <!-- AOS Animate -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!-- Swiper -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet">

    <style>
        :root {
            --accent: #d4a574;
            --accent-light: #e8c9a0;
            --accent-dark: #b8864e;
            --bg-deep: #0a0a0a;
            --bg-dark: #111113;
            --bg-card: #18181b;
            --bg-elevated: #1e1e22;
            --text-primary: #f0ece4;
            --text-secondary: #9a9590;
            --text-muted-clr: #6b6560;
            --border-subtle: rgba(212, 165, 116, 0.08);
            --border-hover: rgba(212, 165, 116, 0.2);
            --glass-bg: rgba(17, 17, 19, 0.85);
            --glass-border: rgba(255, 255, 255, 0.06);
            --shadow-card: 0 8px 32px rgba(0, 0, 0, 0.4);
            --shadow-hover: 0 16px 48px rgba(0, 0, 0, 0.5);
            --font-display: 'Playfair Display', Georgia, serif;
            --font-body: 'Raleway', 'Segoe UI', sans-serif;
            --font-accent: 'Cormorant Garamond', Georgia, serif;
        }

        * { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

        body {
            font-family: var(--font-body);
            background-color: var(--bg-deep);
            color: var(--text-primary);
            font-weight: 300;
            letter-spacing: 0.02em;
        }

        .text-muted { color: var(--text-secondary) !important; }

        /* â”€â”€ Navbar â”€â”€ */
        .navbar-custom {
            background: transparent;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 20px 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 1px solid transparent;
        }
        .navbar-custom.scrolled {
            background: var(--glass-bg);
            padding: 12px 0;
            border-bottom: 1px solid var(--glass-border);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
        }
        .navbar-custom .navbar-brand {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary) !important;
            letter-spacing: 3px;
            text-transform: uppercase;
        }
        .navbar-custom .nav-link {
            color: rgba(240, 236, 228, 0.7) !important;
            font-family: var(--font-body);
            font-weight: 400;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.72rem;
            padding: 8px 18px !important;
            transition: all 0.3s ease;
            position: relative;
        }
        .navbar-custom .nav-link::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 18px;
            right: 18px;
            height: 1px;
            background: var(--accent);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active { color: var(--text-primary) !important; }
        .navbar-custom .nav-link:hover::after,
        .navbar-custom .nav-link.active::after { transform: scaleX(1); }

        /* â”€â”€ Hero Slider â”€â”€ */
        .hero-slider { position: relative; height: 100vh; overflow: hidden; }
        .hero-slider .swiper,
        .hero-slider .swiper-wrapper { height: 100%; }
        .hero-slider .swiper-slide {
            height: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .hero-slider .swiper-slide::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(10, 10, 10, 0.2) 0%,
                rgba(10, 10, 10, 0.1) 40%,
                rgba(10, 10, 10, 0.6) 80%,
                rgba(10, 10, 10, 0.85) 100%
            );
        }
        .hero-content {
            position: absolute;
            bottom: 18%;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            z-index: 2;
            width: 80%;
        }
        .hero-content h1 {
            font-family: var(--font-display);
            font-size: 4rem;
            font-weight: 600;
            letter-spacing: 6px;
            text-transform: uppercase;
            color: #fff;
            text-shadow: 0 2px 40px rgba(0, 0, 0, 0.5);
            margin-bottom: 15px;
        }
        .hero-content p {
            font-family: var(--font-accent);
            font-size: 1.3rem;
            color: var(--accent-light);
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 400;
            font-style: italic;
        }
        .hero-slider .swiper-button-next,
        .hero-slider .swiper-button-prev {
            color: rgba(255, 255, 255, 0.6);
            z-index: 10;
            transition: color 0.3s;
        }
        .hero-slider .swiper-button-next:hover,
        .hero-slider .swiper-button-prev:hover { color: var(--accent); }
        .hero-slider .swiper-button-next:after,
        .hero-slider .swiper-button-prev:after { font-size: 1.3rem; }
        .hero-slider .swiper-pagination-bullet {
            width: 30px;
            height: 2px;
            border-radius: 0;
            background: rgba(255, 255, 255, 0.3);
            opacity: 1;
            transition: all 0.3s;
        }
        .hero-slider .swiper-pagination-bullet-active {
            background: var(--accent);
            width: 50px;
        }

        /* â”€â”€ Sections â”€â”€ */
        .section { padding: 110px 0; }
        .section-alt { background: var(--bg-dark); }
        .section-title {
            text-align: center;
            margin-bottom: 70px;
        }
        .section-title h2 {
            font-family: var(--font-display);
            font-size: 2.6rem;
            font-weight: 500;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--text-primary);
            position: relative;
            display: inline-block;
        }
        .section-title h2::after {
            content: '';
            display: block;
            width: 40px;
            height: 1px;
            background: var(--accent);
            margin: 20px auto 0;
        }
        .section-title p {
            font-family: var(--font-accent);
            color: var(--text-secondary);
            margin-top: 15px;
            font-size: 1.15rem;
            font-style: italic;
            letter-spacing: 1px;
        }

        /* â”€â”€ Gallery â”€â”€ */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 12px;
        }
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 4px;
            aspect-ratio: 4/3;
            cursor: pointer;
        }
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1), filter 0.5s ease;
            filter: brightness(0.9);
        }
        .gallery-item:hover img {
            transform: scale(1.08);
            filter: brightness(1);
        }
        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(10, 10, 10, 0.7) 0%, transparent 50%);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding-bottom: 20px;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .gallery-item:hover .gallery-overlay { opacity: 1; }
        .gallery-overlay i { font-size: 1.5rem; color: var(--accent-light); }

        /* â”€â”€ Cards â”€â”€ */
        .custom-card {
            background: var(--bg-card);
            border: 1px solid var(--border-subtle);
            border-radius: 6px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .custom-card:hover {
            transform: translateY(-4px);
            border-color: var(--border-hover);
            box-shadow: var(--shadow-hover);
        }
        .custom-card .card-img-top {
            height: 260px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .custom-card:hover .card-img-top { transform: scale(1.03); }
        .custom-card .card-body { padding: 28px; }
        .custom-card .card-title {
            font-family: var(--font-display);
            color: var(--text-primary);
            font-weight: 500;
            font-size: 1.15rem;
            letter-spacing: 0.5px;
        }
        .custom-card .card-text {
            color: var(--text-secondary);
            font-size: 0.9rem;
            line-height: 1.7;
        }

        /* â”€â”€ Buttons â”€â”€ */
        .btn-gold {
            background: var(--accent);
            color: var(--bg-deep);
            font-family: var(--font-body);
            font-weight: 600;
            letter-spacing: 2px;
            padding: 14px 36px;
            border: none;
            border-radius: 0;
            text-transform: uppercase;
            font-size: 0.75rem;
            transition: all 0.3s ease;
        }
        .btn-gold:hover {
            background: var(--accent-dark);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 165, 116, 0.25);
        }
        .btn-outline-gold {
            border: 1px solid var(--accent);
            color: var(--accent);
            font-family: var(--font-body);
            font-weight: 500;
            letter-spacing: 2px;
            padding: 12px 32px;
            border-radius: 0;
            text-transform: uppercase;
            font-size: 0.75rem;
            background: transparent;
            transition: all 0.3s ease;
        }
        .btn-outline-gold:hover {
            background: var(--accent);
            color: var(--bg-deep);
            box-shadow: 0 8px 25px rgba(212, 165, 116, 0.15);
        }

        /* â”€â”€ Filter Buttons â”€â”€ */
        .filter-btn {
            background: transparent;
            border: 1px solid rgba(240, 236, 228, 0.12);
            color: var(--text-secondary);
            padding: 10px 28px;
            border-radius: 0;
            font-size: 0.72rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
        }
        .filter-btn:hover, .filter-btn.active {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--bg-deep);
        }

        /* â”€â”€ Testimonials â”€â”€ */
        .testimonial-card {
            background: var(--bg-card);
            border: 1px solid var(--border-subtle);
            border-radius: 6px;
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }
        .testimonial-card::before {
            content: '\201C';
            font-family: var(--font-display);
            font-size: 4rem;
            color: var(--accent);
            opacity: 0.2;
            position: absolute;
            top: 10px;
            left: 20px;
            line-height: 1;
        }
        .testimonial-card img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--accent);
            margin-bottom: 20px;
        }
        .testimonial-card .stars { color: var(--accent); margin-bottom: 15px; font-size: 0.85rem; }
        .testimonial-card p {
            color: var(--text-secondary);
            font-family: var(--font-accent);
            font-style: italic;
            font-size: 1.05rem;
            line-height: 1.8;
        }
        .testimonial-card h5 {
            font-family: var(--font-display);
            color: var(--text-primary);
            margin-top: 20px;
            font-size: 1rem;
            letter-spacing: 1px;
        }
        .testimonial-card small { color: var(--text-muted-clr); font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase; }

        /* â”€â”€ Footer â”€â”€ */
        .footer {
            background: var(--bg-dark);
            padding: 80px 0 30px;
            border-top: 1px solid var(--border-subtle);
        }
        .footer h5 {
            font-family: var(--font-display);
            color: var(--text-primary);
            font-weight: 500;
            letter-spacing: 2px;
            font-size: 1.1rem;
            margin-bottom: 25px;
            text-transform: uppercase;
        }
        .footer p, .footer a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.9rem;
        }
        .footer a:hover { color: var(--accent); }
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 0;
            border: 1px solid rgba(240, 236, 228, 0.1);
            color: var(--text-secondary);
            margin-right: 8px;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        .footer-social a:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--bg-deep);
        }
        .footer-bottom {
            border-top: 1px solid var(--border-subtle);
            margin-top: 50px;
            padding-top: 25px;
            text-align: center;
        }
        .footer-bottom p { color: var(--text-muted-clr); font-size: 0.8rem; letter-spacing: 1px; }

        /* â”€â”€ Page Header â”€â”€ */
        .page-header {
            background: var(--bg-dark);
            padding: 140px 0 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .page-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 1px;
            background: var(--accent);
        }
        .page-header h1 {
            font-family: var(--font-display);
            font-size: 2.8rem;
            font-weight: 500;
            letter-spacing: 6px;
            text-transform: uppercase;
            color: var(--text-primary);
        }
        .page-header .breadcrumb { justify-content: center; margin-top: 15px; }
        .page-header .breadcrumb-item a {
            color: var(--accent);
            text-decoration: none;
            font-size: 0.8rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .page-header .breadcrumb-item.active {
            color: var(--text-muted-clr);
            font-size: 0.8rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .page-header .breadcrumb-item + .breadcrumb-item::before { color: var(--text-muted-clr); }

        /* â”€â”€ Image Protection â”€â”€ */
        .protected-image {
            -webkit-user-drag: none;
            user-select: none;
            pointer-events: none;
        }

        /* â”€â”€ Scroll to Top â”€â”€ */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 48px;
            height: 48px;
            background: var(--accent);
            color: var(--bg-deep);
            border: none;
            border-radius: 0;
            font-size: 1.1rem;
            display: none;
            z-index: 999;
            cursor: pointer;
            transition: all 0.3s;
        }
        .scroll-top:hover {
            background: var(--accent-dark);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(212, 165, 116, 0.25);
        }

        /* â”€â”€ CTA â”€â”€ */
        .cta-heading {
            font-family: var(--font-display);
            font-size: 2.5rem;
            letter-spacing: 5px;
        }

        /* â”€â”€ Animations â”€â”€ */
        .fade-in { opacity: 0; transform: translateY(20px); transition: all 0.6s; }
        .fade-in.visible { opacity: 1; transform: translateY(0); }

        /* â”€â”€ Pagination â”€â”€ */
        .pagination { gap: 4px; justify-content: center; flex-wrap: wrap; }
        .pagination .page-link {
            background: var(--bg-card);
            border: 1px solid var(--border-subtle);
            color: var(--accent);
            border-radius: 0 !important;
            padding: 10px 16px;
            font-size: 0.8rem;
            line-height: 1;
            min-width: 42px;
            text-align: center;
            transition: all 0.3s;
            font-family: var(--font-body);
            letter-spacing: 1px;
        }
        .pagination .page-link:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--bg-deep);
        }
        .pagination .page-item.active .page-link {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--bg-deep);
            font-weight: 600;
        }
        .pagination .page-item.disabled .page-link {
            background: var(--bg-deep);
            border-color: rgba(255, 255, 255, 0.04);
            color: var(--text-muted-clr);
        }

        /* â”€â”€ Responsive â”€â”€ */
        @media (max-width: 991px) {
            .navbar-custom .navbar-collapse {
                background: rgba(10, 10, 10, 0.98);
                margin: 15px -16px -20px;
                padding: 20px 24px;
                border-top: 1px solid var(--border-subtle);
            }
            .navbar-custom .nav-link {
                padding: 12px 0 !important;
                border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            }
            .navbar-custom .nav-link::after { display: none; }
        }

        @media (max-width: 768px) {
            .hero-slider { height: 75vh; }
            .hero-content { width: 90%; bottom: 15%; }
            .hero-content h1 { font-size: 2rem; letter-spacing: 3px; }
            .hero-content p { font-size: 0.95rem; letter-spacing: 2px; }
            .hero-slider .swiper-button-next,
            .hero-slider .swiper-button-prev { display: none; }
            .section { padding: 70px 0; }
            .section-title { margin-bottom: 45px; }
            .section-title h2 { font-size: 1.8rem; letter-spacing: 3px; }
            .gallery-grid { grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 8px; }
            .custom-card .card-img-top { height: 200px; }
            .page-header { padding: 110px 0 45px; }
            .page-header h1 { font-size: 1.8rem; letter-spacing: 4px; }
            .filter-btn { padding: 7px 18px; font-size: 0.68rem; }
            .btn-gold { padding: 11px 26px; font-size: 0.72rem; }
            .btn-outline-gold { padding: 9px 22px; font-size: 0.72rem; }
            .testimonial-card { padding: 30px 20px; }
            .testimonial-card img { width: 60px; height: 60px; }
            .footer { padding: 50px 0 20px; }
            .scroll-top { bottom: 20px; right: 20px; width: 42px; height: 42px; }
            .pagination .page-link { padding: 6px 10px; font-size: 0.75rem; min-width: 34px; }
            .cta-heading { font-size: 1.5rem; letter-spacing: 3px !important; }
            .w-md-auto { width: 100% !important; }
        }

        @media (max-width: 480px) {
            .hero-slider { height: 65vh; }
            .hero-content h1 { font-size: 1.5rem; letter-spacing: 2px; }
            .hero-content p { font-size: 0.8rem; letter-spacing: 1px; }
            .gallery-grid { grid-template-columns: 1fr 1fr; gap: 6px; }
            .gallery-item { border-radius: 2px; }
            .section { padding: 50px 0; }
            .section-title h2 { font-size: 1.4rem; letter-spacing: 2px; }
            .page-header { padding: 100px 0 35px; }
            .page-header h1 { font-size: 1.4rem; letter-spacing: 3px; }
            .custom-card .card-img-top { height: 180px; }
            .custom-card .card-body { padding: 18px; }
            .navbar-custom .navbar-brand { font-size: 1.1rem; letter-spacing: 2px; }
            .filter-btn { padding: 6px 14px; font-size: 0.65rem; }
            .footer-social a { width: 36px; height: 36px; }
            .cta-heading { font-size: 1.1rem; letter-spacing: 2px !important; }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                @if(!empty($siteSettings['site_logo']))
                    <img src="{{ asset('storage/' . $siteSettings['site_logo']) }}" alt="{{ $siteSettings['site_name'] ?? 'BSK Photography' }}" height="40">
                @else
                    {{ $siteSettings['site_name'] ?? 'BSK Photography' }}
                @endif
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list text-white fs-4"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}" href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('events*') ? 'active' : '' }}" href="{{ route('events') }}">Events</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog*') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>{{ $siteSettings['site_name'] ?? 'BSK Photography' }}</h5>
                    <p>{{ $siteSettings['site_tagline'] ?? 'Capturing Moments That Last Forever' }}</p>
                    <div class="footer-social mt-3">
                        @foreach($socialLinks as $link)
                            <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" title="{{ $link->platform }}">
                                <i class="bi bi-{{ $link->icon }}"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
                        <li class="mb-2"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                        <li class="mb-2"><a href="{{ route('services') }}">Services</a></li>
                        <li class="mb-2"><a href="{{ route('events') }}">Events</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5>Explore</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('about') }}">About</a></li>
                        <li class="mb-2"><a href="{{ route('blog') }}">Blog</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 mb-4">
                    <h5>Get In Touch</h5>
                    @if(!empty($siteSettings['site_email']))
                        <p><i class="bi bi-envelope me-2"></i>{{ $siteSettings['site_email'] }}</p>
                    @endif
                    @if(!empty($siteSettings['site_phone']))
                        <p><i class="bi bi-phone me-2"></i>{{ $siteSettings['site_phone'] }}</p>
                    @endif
                    @if(!empty($siteSettings['site_address']))
                        <p><i class="bi bi-geo-alt me-2"></i>{{ $siteSettings['site_address'] }}</p>
                    @endif
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">{{ $siteSettings['footer_text'] ?? 'Â© ' . date('Y') . ' BSK Photography. All Rights Reserved.' }}</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <button class="scroll-top" id="scrollTop"><i class="bi bi-arrow-up"></i></button>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Init AOS
        AOS.init({ duration: 800, once: true });

        // Lightbox Options
        lightbox.option({ resizeDuration: 200, wrapAround: true, albumLabel: 'Image %1 of %2' });

        // Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar-custom');
            navbar.classList.toggle('scrolled', window.scrollY > 50);

            const scrollBtn = document.getElementById('scrollTop');
            scrollBtn.style.display = window.scrollY > 300 ? 'flex' : 'none';
            scrollBtn.style.alignItems = 'center';
            scrollBtn.style.justifyContent = 'center';
        });

        // Scroll to Top
        document.getElementById('scrollTop').addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Image Protection
        document.addEventListener('contextmenu', function(e) {
            if (e.target.closest('.protected-image')) {
                e.preventDefault();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
