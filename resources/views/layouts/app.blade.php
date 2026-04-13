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
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Lightbox2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
    <!-- AOS Animate -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!-- Swiper -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet">

    <style>
        :root {
            --accent: #c4653a;
            --accent-light: #e8845a;
            --accent-dark: #a04f2a;
            --accent-subtle: rgba(196, 101, 58, 0.08);
            --accent-subtle-hover: rgba(196, 101, 58, 0.14);
            --bg-primary: #faf9f6;
            --bg-white: #ffffff;
            --bg-cream: #f3f1ec;
            --bg-dark: #1a1a2e;
            --bg-dark-soft: #252542;
            --text-dark: #1a1a2e;
            --text-body: #4a4a5a;
            --text-muted-clr: #8a8a9a;
            --text-light: #faf9f6;
            --border-light: #e8e6e1;
            --border-med: #d5d2cb;
            --shadow-sm: 0 2px 8px rgba(26, 26, 46, 0.06);
            --shadow-md: 0 8px 30px rgba(26, 26, 46, 0.1);
            --shadow-lg: 0 20px 60px rgba(26, 26, 46, 0.12);
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 20px;
            --radius-xl: 28px;
            --font-display: 'DM Serif Display', Georgia, serif;
            --font-body: 'Inter', 'Segoe UI', sans-serif;
            --font-accent: 'Space Grotesk', sans-serif;
        }

        * { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

        body {
            font-family: var(--font-body);
            background-color: var(--bg-primary);
            color: var(--text-body);
            font-weight: 400;
            line-height: 1.7;
        }

        .text-muted { color: var(--text-muted-clr) !important; }

        /* ── Navbar ── */
        .navbar-custom {
            background: var(--bg-white);
            padding: 0;
            border-bottom: none;
            z-index: 1030;
            position: relative;
            box-shadow: 0 2px 20px rgba(26, 26, 46, 0.08);
        }
        .navbar-custom .container {
            padding-top: 0;
            padding-bottom: 0;
        }
        .navbar-custom .navbar-brand {
            font-family: var(--font-display);
            font-size: 1.7rem;
            font-weight: 400;
            color: var(--text-dark) !important;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 16px 0;
        }
        .navbar-custom .navbar-brand img { border-radius: 6px; }
        .navbar-custom .navbar-brand .brand-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            margin-left: 2px;
        }
        .navbar-custom .nav-link {
            color: var(--text-body) !important;
            font-family: var(--font-accent);
            font-weight: 500;
            letter-spacing: 0.3px;
            font-size: 0.85rem;
            text-transform: uppercase;
            padding: 22px 18px !important;
            transition: all 0.3s ease;
            position: relative;
            border-bottom: 3px solid transparent;
        }
        .navbar-custom .nav-link:hover {
            color: var(--accent) !important;
            border-bottom-color: var(--accent-light);
        }
        .navbar-custom .nav-link.active {
            color: var(--accent) !important;
            font-weight: 600;
            border-bottom-color: var(--accent);
        }
        .navbar-custom .nav-cta {
            background: var(--accent);
            color: #fff !important;
            border-radius: var(--radius-sm);
            padding: 10px 24px !important;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border-bottom: none;
            margin-left: 8px;
            text-transform: none;
            align-self: center;
        }
        .navbar-custom .nav-cta:hover {
            background: var(--accent-dark);
            color: #fff !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(196, 101, 58, 0.3);
            border-bottom-color: transparent;
        }
        .navbar-custom .nav-cta.active {
            background: var(--accent-dark);
            color: #fff !important;
            border-bottom-color: transparent;
        }
        .navbar-toggler { border: none; padding: 4px 8px; }
        .navbar-toggler:focus { box-shadow: none; }

        /* ── Hero Slider ── */
        .hero-slider { position: relative; height: 100vh; overflow: hidden; border-radius: 0 0 var(--radius-xl) var(--radius-xl); }
        .hero-slider .swiper, .hero-slider .swiper-wrapper { height: 100%; }
        .hero-slider .swiper-slide {
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        .hero-slider .swiper-slide .slide-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            transform: scale(1);
            transition: transform 7s ease-out;
        }
        .hero-slider .swiper-slide-active .slide-bg {
            transform: scale(1.12);
        }
        .hero-slider .swiper-slide::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg, rgba(26,26,46,0.35) 0%, rgba(26,26,46,0.1) 40%, rgba(26,26,46,0.55) 80%, rgba(26,26,46,0.8) 100%);
            z-index: 1;
        }
        .hero-content {
            position: absolute;
            bottom: 12%;
            left: 6%;
            z-index: 2;
            max-width: 700px;
        }
        .hero-content h1,
        .hero-content p,
        .hero-content .btn {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .swiper-slide-active .hero-content h1 {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.3s;
        }
        .swiper-slide-active .hero-content p {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.6s;
        }
        .swiper-slide-active .hero-content .btn {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.9s;
        }
        .hero-content h1 {
            font-family: var(--font-display);
            font-size: 4.2rem;
            font-weight: 400;
            line-height: 1.1;
            color: #fff;
            text-shadow: 0 4px 40px rgba(0,0,0,0.3);
            margin-bottom: 16px;
        }
        .hero-content p {
            font-family: var(--font-accent);
            font-size: 1.1rem;
            color: rgba(255,255,255,0.8);
            letter-spacing: 0.5px;
            font-weight: 400;
            max-width: 500px;
        }
        .hero-slider .swiper-button-next,
        .hero-slider .swiper-button-prev {
            width: 50px; height: 50px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            color: #fff;
            z-index: 10;
            transition: all 0.3s;
        }
        .hero-slider .swiper-button-next:hover,
        .hero-slider .swiper-button-prev:hover { background: var(--accent); }
        .hero-slider .swiper-button-next:after,
        .hero-slider .swiper-button-prev:after { font-size: 1rem; }
        .hero-slider .swiper-pagination-bullet {
            width: 10px; height: 10px;
            border-radius: 50%;
            background: rgba(255,255,255,0.4);
            opacity: 1;
            transition: all 0.3s;
        }
        .hero-slider .swiper-pagination-bullet-active {
            background: var(--accent);
            transform: scale(1.3);
        }

        /* ── Sections ── */
        .section { padding: 100px 0; }
        .section-cream { background: var(--bg-cream); }
        .section-dark { background: var(--bg-dark); color: var(--text-light); }
        .section-dark .text-muted { color: rgba(250,249,246,0.5) !important; }
        .section-dark .section-title h2 { color: var(--text-light); }
        .section-dark .section-title p { color: rgba(250,249,246,0.6); }
        .section-title { margin-bottom: 60px; }
        .section-title h2 {
            font-family: var(--font-display);
            font-size: 2.8rem;
            font-weight: 400;
            color: var(--text-dark);
            line-height: 1.2;
        }
        .section-title .subtitle {
            font-family: var(--font-accent);
            color: var(--accent);
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            display: block;
            margin-bottom: 10px;
        }
        .section-title p {
            color: var(--text-muted-clr);
            margin-top: 12px;
            font-size: 1.05rem;
            max-width: 550px;
        }
        .section-title.text-center p { margin-left: auto; margin-right: auto; }

        /* ── Gallery ── */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 16px;
        }
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-md);
            aspect-ratio: 4/3;
            cursor: pointer;
        }
        .gallery-item img {
            width: 100%; height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .gallery-item:hover img { transform: scale(1.06); }
        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(26,26,46,0.7) 0%, transparent 60%);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding-bottom: 24px;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .gallery-item:hover .gallery-overlay { opacity: 1; }
        .gallery-overlay i { font-size: 1.5rem; color: #fff; }

        /* ── Cards ── */
        .custom-card {
            background: var(--bg-white);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .custom-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: transparent;
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
            color: var(--text-dark);
            font-weight: 400;
            font-size: 1.2rem;
            line-height: 1.3;
        }
        .custom-card .card-text {
            color: var(--text-body);
            font-size: 0.92rem;
            line-height: 1.7;
        }

        /* ── Buttons ── */
        .btn-accent {
            background: var(--accent);
            color: #fff;
            font-family: var(--font-accent);
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 14px 34px;
            border: none;
            border-radius: 50px;
            font-size: 0.88rem;
            transition: all 0.3s ease;
        }
        .btn-accent:hover {
            background: var(--accent-dark);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(196, 101, 58, 0.3);
        }
        .btn-outline-accent {
            border: 2px solid var(--accent);
            color: var(--accent);
            font-family: var(--font-accent);
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 12px 32px;
            border-radius: 50px;
            font-size: 0.88rem;
            background: transparent;
            transition: all 0.3s ease;
        }
        .btn-outline-accent:hover {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 8px 25px rgba(196, 101, 58, 0.2);
        }
        /* legacy aliases */
        .btn-gold { background: var(--accent); color: #fff; font-family: var(--font-accent); font-weight: 600; letter-spacing: 0.5px; padding: 14px 34px; border: none; border-radius: 50px; font-size: 0.88rem; transition: all 0.3s ease; }
        .btn-gold:hover { background: var(--accent-dark); color: #fff; transform: translateY(-2px); box-shadow: 0 8px 25px rgba(196, 101, 58, 0.3); }
        .btn-outline-gold { border: 2px solid var(--accent); color: var(--accent); font-family: var(--font-accent); font-weight: 600; letter-spacing: 0.5px; padding: 12px 32px; border-radius: 50px; font-size: 0.88rem; background: transparent; transition: all 0.3s ease; }
        .btn-outline-gold:hover { background: var(--accent); color: #fff; box-shadow: 0 8px 25px rgba(196, 101, 58, 0.2); }

        /* ── Filter Buttons ── */
        .filter-btn {
            background: var(--bg-white);
            border: 1px solid var(--border-light);
            color: var(--text-body);
            padding: 10px 24px;
            border-radius: 50px;
            font-size: 0.82rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
            font-family: var(--font-accent);
        }
        .filter-btn:hover, .filter-btn.active {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
            box-shadow: 0 4px 15px rgba(196, 101, 58, 0.2);
        }

        /* ── Testimonials ── */
        .testimonial-card {
            background: var(--bg-white);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-lg);
            padding: 40px 32px;
            text-align: center;
            position: relative;
            transition: box-shadow 0.3s;
        }
        .testimonial-card:hover { box-shadow: var(--shadow-md); }
        .testimonial-card::before {
            content: '\201C';
            font-family: var(--font-display);
            font-size: 5rem;
            color: var(--accent);
            opacity: 0.15;
            position: absolute;
            top: 5px;
            left: 20px;
            line-height: 1;
        }
        .testimonial-card img {
            width: 70px; height: 70px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--accent-subtle);
            margin-bottom: 20px;
        }
        .testimonial-card .stars { color: var(--accent); margin-bottom: 15px; font-size: 0.9rem; }
        .testimonial-card p {
            color: var(--text-body);
            font-style: italic;
            font-size: 1.02rem;
            line-height: 1.8;
        }
        .testimonial-card h5 {
            font-family: var(--font-display);
            color: var(--text-dark);
            margin-top: 20px;
            font-size: 1.05rem;
        }
        .testimonial-card small { color: var(--text-muted-clr); font-size: 0.82rem; letter-spacing: 0.5px; }

        /* ── Footer ── */
        .footer {
            background: var(--bg-dark);
            padding: 80px 0 30px;
            color: rgba(250,249,246,0.8);
            border-radius: var(--radius-xl) var(--radius-xl) 0 0;
        }
        .footer h5 {
            font-family: var(--font-display);
            color: var(--text-light);
            font-weight: 400;
            font-size: 1.2rem;
            margin-bottom: 22px;
        }
        .footer p, .footer a {
            color: rgba(250,249,246,0.6);
            text-decoration: none;
            font-size: 0.9rem;
        }
        .footer a:hover { color: var(--accent-light); }
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px; height: 42px;
            border-radius: 50%;
            border: 1px solid rgba(250,249,246,0.15);
            color: rgba(250,249,246,0.6);
            margin-right: 8px;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        .footer-social a:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }
        .footer-bottom {
            border-top: 1px solid rgba(250,249,246,0.08);
            margin-top: 50px;
            padding-top: 25px;
            text-align: center;
        }
        .footer-bottom p { color: rgba(250,249,246,0.35); font-size: 0.82rem; letter-spacing: 0.5px; }

        /* ── Page Header ── */
        .page-header {
            padding: 18px 0;
            border-bottom: 1px solid var(--border-light);
            background: var(--bg-white);
        }
        .page-header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .page-header h1 {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 400;
            color: var(--text-dark);
            margin: 0;
        }
        .page-header .breadcrumb { margin: 0; }
        .page-header .breadcrumb-item a {
            color: var(--text-muted-clr);
            text-decoration: none;
            font-size: 0.82rem;
            font-family: var(--font-accent);
            transition: color 0.3s;
        }
        .page-header .breadcrumb-item a:hover { color: var(--accent); }
        .page-header .breadcrumb-item.active {
            color: var(--accent);
            font-size: 0.82rem;
            font-weight: 500;
            font-family: var(--font-accent);
        }
        .page-header .breadcrumb-item + .breadcrumb-item::before { color: var(--border-med); }

        /* ── Image Protection ── */
        .protected-image {
            -webkit-user-drag: none;
            user-select: none;
            pointer-events: none;
        }

        /* ── Scroll to Top ── */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 48px; height: 48px;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 50%;
            font-size: 1.1rem;
            display: none;
            z-index: 999;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 20px rgba(196, 101, 58, 0.3);
        }
        .scroll-top:hover {
            background: var(--accent-dark);
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(196, 101, 58, 0.4);
        }

        /* ── CTA ── */
        .cta-section {
            background: var(--bg-dark);
            border-radius: var(--radius-xl);
            padding: 80px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-section::before {
            content: '';
            position: absolute;
            top: -40%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(196,101,58,0.15) 0%, transparent 70%);
            border-radius: 50%;
        }
        .cta-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            right: -10%;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(196,101,58,0.1) 0%, transparent 70%);
            border-radius: 50%;
        }
        .cta-heading {
            font-family: var(--font-display);
            font-size: 2.5rem;
            color: var(--text-light);
            position: relative;
            z-index: 1;
        }

        /* ── Animations ── */
        .fade-in { opacity: 0; transform: translateY(20px); transition: all 0.6s; }
        .fade-in.visible { opacity: 1; transform: translateY(0); }

        /* ── Pagination ── */
        .pagination { gap: 6px; justify-content: center; flex-wrap: wrap; }
        .pagination .page-link {
            background: var(--bg-white);
            border: 1px solid var(--border-light);
            color: var(--text-dark);
            border-radius: var(--radius-sm) !important;
            padding: 10px 16px;
            font-size: 0.85rem;
            min-width: 42px;
            text-align: center;
            transition: all 0.3s;
            font-family: var(--font-accent);
        }
        .pagination .page-link:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }
        .pagination .page-item.active .page-link {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }
        .pagination .page-item.disabled .page-link {
            background: var(--bg-cream);
            border-color: var(--border-light);
            color: var(--text-muted-clr);
        }

        /* ── Feature Stat ── */
        .stat-item { text-align: center; padding: 30px 20px; }
        .stat-item .stat-number {
            font-family: var(--font-display);
            font-size: 2.8rem;
            color: var(--accent);
            line-height: 1;
        }
        .stat-item .stat-label {
            font-family: var(--font-accent);
            font-size: 0.85rem;
            color: var(--text-muted-clr);
            margin-top: 8px;
            letter-spacing: 0.5px;
        }

        /* ── Responsive ── */
        @media (max-width: 991px) {
            .navbar-custom .navbar-collapse {
                background: var(--bg-white);
                margin: 0 -12px;
                padding: 12px 20px 16px;
                border-top: 1px solid var(--border-light);
                box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            }
            .navbar-custom .nav-link {
                padding: 10px 14px !important;
                border-bottom: none;
                border-radius: var(--radius-sm);
                text-transform: none;
            }
            .navbar-custom .nav-link:hover {
                background: var(--accent-subtle);
                border-bottom-color: transparent;
            }
            .navbar-custom .nav-link.active {
                background: var(--accent-subtle);
                border-bottom-color: transparent;
            }
            .navbar-custom .nav-cta {
                display: block;
                margin: 8px 0 0;
                text-align: center;
                padding: 12px 24px !important;
            }
        }

        @media (max-width: 768px) {
            .hero-slider { height: 80vh; border-radius: 0 0 var(--radius-lg) var(--radius-lg); }
            .hero-content { left: 5%; right: 5%; max-width: none; bottom: 10%; }
            .hero-content h1 { font-size: 2.2rem; }
            .hero-content p { font-size: 0.95rem; }
            .hero-slider .swiper-button-next,
            .hero-slider .swiper-button-prev { display: none; }
            .section { padding: 60px 0; }
            .section-title { margin-bottom: 40px; }
            .section-title h2 { font-size: 2rem; }
            .gallery-grid { grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 10px; }
            .custom-card .card-img-top { height: 200px; }
            .page-header h1 { font-size: 1.3rem; }
            .page-header .container { flex-direction: column; text-align: center; gap: 6px; }
            .filter-btn { padding: 8px 18px; font-size: 0.78rem; }
            .btn-accent, .btn-gold { padding: 12px 26px; font-size: 0.82rem; }
            .btn-outline-accent, .btn-outline-gold { padding: 10px 22px; font-size: 0.82rem; }
            .testimonial-card { padding: 30px 20px; }
            .testimonial-card img { width: 60px; height: 60px; }
            .footer { padding: 50px 0 20px; border-radius: var(--radius-lg) var(--radius-lg) 0 0; }
            .scroll-top { bottom: 20px; right: 20px; width: 42px; height: 42px; }
            .pagination .page-link { padding: 8px 12px; font-size: 0.8rem; min-width: 36px; }
            .cta-heading { font-size: 1.6rem; }
            .cta-section { padding: 50px 24px; border-radius: var(--radius-lg); }
            .stat-item .stat-number { font-size: 2rem; }
            .w-md-auto { width: 100% !important; }
        }

        @media (max-width: 480px) {
            .hero-slider { height: 70vh; }
            .hero-content h1 { font-size: 1.7rem; }
            .hero-content p { font-size: 0.85rem; }
            .gallery-grid { grid-template-columns: 1fr 1fr; gap: 8px; }
            .gallery-item { border-radius: var(--radius-sm); }
            .section { padding: 45px 0; }
            .section-title h2 { font-size: 1.6rem; }
            .page-header { padding: 14px 0; }
            .page-header h1 { font-size: 1.15rem; }
            .custom-card .card-img-top { height: 180px; }
            .custom-card .card-body { padding: 18px; }
            .navbar-custom .navbar-brand { font-size: 1.2rem; }
            .filter-btn { padding: 6px 14px; font-size: 0.72rem; }
            .footer-social a { width: 36px; height: 36px; }
            .cta-heading { font-size: 1.3rem; }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                @if(!empty($siteSettings['site_logo']))
                    <img src="{{ asset('storage/' . $siteSettings['site_logo']) }}" alt="{{ $siteSettings['site_name'] ?? 'BSK Photography' }}" height="42">
                @else
                    {{ $siteSettings['site_name'] ?? 'BSK Photography' }}<span class="brand-dot"></span>
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list fs-4" style="color: var(--text-dark);"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}" href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('events*') ? 'active' : '' }}" href="{{ route('events') }}">Events</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('blog*') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link nav-cta {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}"><i class="bi bi-camera me-1"></i> Book Now</a></li>
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
                    <p style="max-width: 300px;">{{ $siteSettings['site_tagline'] ?? 'Capturing Moments That Last Forever' }}</p>
                    <div class="footer-social mt-3">
                        @foreach($socialLinks as $link)
                            <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" title="{{ $link->platform }}">
                                <i class="bi bi-{{ $link->icon }}"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5>Navigate</h5>
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
                        <p class="mb-2"><i class="bi bi-envelope me-2" style="color: var(--accent);"></i>{{ $siteSettings['site_email'] }}</p>
                    @endif
                    @if(!empty($siteSettings['site_phone']))
                        <p class="mb-2"><i class="bi bi-phone me-2" style="color: var(--accent);"></i>{{ $siteSettings['site_phone'] }}</p>
                    @endif
                    @if(!empty($siteSettings['site_address']))
                        <p class="mb-2"><i class="bi bi-geo-alt me-2" style="color: var(--accent);"></i>{{ $siteSettings['site_address'] }}</p>
                    @endif
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">{{ $siteSettings['footer_text'] ?? '© ' . date('Y') . ' BSK Photography. All Rights Reserved.' }}</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <button class="scroll-top" id="scrollTop"><i class="bi bi-arrow-up"></i></button>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        AOS.init({ duration: 700, once: true, offset: 80 });
        lightbox.option({ resizeDuration: 200, wrapAround: true, albumLabel: 'Image %1 of %2' });

        window.addEventListener('scroll', () => {
            const scrollBtn = document.getElementById('scrollTop');
            scrollBtn.style.display = window.scrollY > 300 ? 'flex' : 'none';
            scrollBtn.style.alignItems = 'center';
            scrollBtn.style.justifyContent = 'center';
        });

        document.getElementById('scrollTop').addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        document.addEventListener('contextmenu', function(e) {
            if (e.target.closest('.protected-image')) { e.preventDefault(); }
        });
    </script>
    @stack('scripts')
</body>
</html>
