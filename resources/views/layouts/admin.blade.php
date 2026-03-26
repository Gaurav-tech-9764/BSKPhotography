<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - {{ $siteSettings['site_name'] ?? 'BSK Photography' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --primary: #c9a96e;
            --dark-bg: #1a1a2e;
            --sidebar-bg: #16213e;
            --card-bg: #0f3460;
        }

        body { font-family: 'Segoe UI', sans-serif; background: #f4f6f9; }

        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            color: #fff;
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s;
        }
        .admin-sidebar .brand {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .admin-sidebar .brand h4 {
            color: var(--primary);
            font-weight: 700;
            letter-spacing: 1px;
            margin: 0;
            font-size: 1.1rem;
        }
        .sidebar-nav { padding: 15px 0; }
        .sidebar-nav .nav-item { margin: 2px 10px; }
        .sidebar-nav .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 10px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
            transition: all 0.2s;
        }
        .sidebar-nav .nav-link:hover {
            color: #fff;
            background: rgba(255,255,255,0.1);
        }
        .sidebar-nav .nav-link.active {
            color: #fff;
            background: var(--primary);
            font-weight: 600;
        }
        .sidebar-nav .nav-link i { font-size: 1.1rem; width: 20px; text-align: center; }

        /* Main Content */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        /* Top Bar */
        .admin-topbar {
            background: #fff;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .admin-topbar h5 { margin: 0; font-weight: 600; color: #333; }

        .admin-content { padding: 30px; }

        /* Cards */
        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .stat-card:hover { transform: translateY(-3px); }
        .stat-card .icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }
        .stat-card h3 { font-weight: 700; margin: 10px 0 5px; }
        .stat-card p { color: #888; margin: 0; font-size: 0.85rem; }

        .btn-primary { background: var(--primary); border-color: var(--primary); color: #fff; }
        .btn-primary:hover { background: #b08d4f; border-color: #b08d4f; }

        .table th { font-weight: 600; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; color: #555; }

        .alert { border-radius: 10px; }

        /* Mobile sidebar toggle */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1100;
            background: var(--primary);
            border: none;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            font-size: 1.2rem;
        }

        @media (max-width: 992px) {
            .admin-sidebar { transform: translateX(-100%); }
            .admin-sidebar.show { transform: translateX(0); }
            .admin-main { margin-left: 0; }
            .sidebar-toggle { display: flex; align-items: center; justify-content: center; }
        }

        .badge-unread {
            background: #e74c3c;
            color: #fff;
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 50px;
        }

        .img-thumbnail-sm {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Mobile Sidebar Toggle -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="brand">
            <h4><i class="bi bi-camera"></i> BSK Admin</h4>
        </div>
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-grid-1x2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.categories*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                        <i class="bi bi-tags"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.portfolio*') ? 'active' : '' }}" href="{{ route('admin.portfolio.index') }}">
                        <i class="bi bi-images"></i> Portfolio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.events*') ? 'active' : '' }}" href="{{ route('admin.events.index') }}">
                        <i class="bi bi-calendar-event"></i> Events
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                        <i class="bi bi-briefcase"></i> Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.about*') ? 'active' : '' }}" href="{{ route('admin.about.edit') }}">
                        <i class="bi bi-person-circle"></i> About Us
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}">
                        <i class="bi bi-chat-quote"></i> Testimonials
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.blog*') ? 'active' : '' }}" href="{{ route('admin.blog.index') }}">
                        <i class="bi bi-journal-richtext"></i> Blog Posts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.inquiries*') ? 'active' : '' }}" href="{{ route('admin.inquiries.index') }}">
                        <i class="bi bi-envelope"></i> Inquiries
                        @php $unreadCount = \App\Models\ContactInquiry::unread()->count(); @endphp
                        @if($unreadCount > 0)
                            <span class="badge-unread ms-auto">{{ $unreadCount }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.banners*') ? 'active' : '' }}" href="{{ route('admin.banners.index') }}">
                        <i class="bi bi-image"></i> Banners
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.social-links*') ? 'active' : '' }}" href="{{ route('admin.social-links.index') }}">
                        <i class="bi bi-share"></i> Social Links
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}" href="{{ route('admin.settings.edit') }}">
                        <i class="bi bi-gear"></i> Settings
                    </a>
                </li>
                <li class="nav-item mt-3" style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 10px;">
                    <a class="nav-link" href="{{ route('home') }}" target="_blank">
                        <i class="bi bi-box-arrow-up-right"></i> View Website
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent" style="color: rgba(255,255,255,0.7);">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <div class="admin-topbar">
            <h5>@yield('page-title', 'Dashboard')</h5>
            <div>
                <span class="text-muted">Welcome, {{ auth()->user()->name }}</span>
            </div>
        </div>

        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', () => {
            document.getElementById('adminSidebar').classList.toggle('show');
        });
    </script>
    @stack('scripts')
</body>
</html>
