@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h3>{{ $stats['portfolio_images'] }}</h3>
                    <p>Portfolio Images</p>
                </div>
                <div class="icon" style="background: rgba(201,169,110,0.15); color: #c9a96e;">
                    <i class="bi bi-images"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h3>{{ $stats['categories'] }}</h3>
                    <p>Categories</p>
                </div>
                <div class="icon" style="background: rgba(52,152,219,0.15); color: #3498db;">
                    <i class="bi bi-tags"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h3>{{ $stats['services'] }}</h3>
                    <p>Services</p>
                </div>
                <div class="icon" style="background: rgba(46,204,113,0.15); color: #2ecc71;">
                    <i class="bi bi-briefcase"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h3>{{ $stats['unread_inquiries'] }}</h3>
                    <p>Unread Inquiries</p>
                </div>
                <div class="icon" style="background: rgba(231,76,60,0.15); color: #e74c3c;">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h3>{{ $stats['events'] }}</h3>
                    <p>Events</p>
                </div>
                <div class="icon" style="background: rgba(155,89,182,0.15); color: #9b59b6;">
                    <i class="bi bi-calendar-event"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h3>{{ $stats['testimonials'] }}</h3>
                    <p>Testimonials</p>
                </div>
                <div class="icon" style="background: rgba(241,196,15,0.15); color: #f1c40f;">
                    <i class="bi bi-chat-quote"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h3>{{ $stats['blog_posts'] }}</h3>
                    <p>Blog Posts</p>
                </div>
                <div class="icon" style="background: rgba(26,188,156,0.15); color: #1abc9c;">
                    <i class="bi bi-journal-richtext"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h3>{{ $stats['banners'] }}</h3>
                    <p>Banners</p>
                </div>
                <div class="icon" style="background: rgba(230,126,34,0.15); color: #e67e22;">
                    <i class="bi bi-image"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Inquiries -->
<div class="card border-0 shadow-sm" style="border-radius: 12px;">
    <div class="card-header bg-white d-flex justify-content-between align-items-center" style="border-radius: 12px 12px 0 0;">
        <h6 class="mb-0 fw-bold">Recent Inquiries</h6>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentInquiries as $inquiry)
                        <tr>
                            <td class="ps-4">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-decoration-none fw-semibold">{{ $inquiry->name }}</a>
                            </td>
                            <td>{{ $inquiry->email }}</td>
                            <td>{{ Str::limit($inquiry->subject, 30) ?? '-' }}</td>
                            <td>
                                @if($inquiry->is_read)
                                    <span class="badge bg-success">Read</span>
                                @else
                                    <span class="badge bg-warning text-dark">New</span>
                                @endif
                            </td>
                            <td>{{ $inquiry->created_at->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">No inquiries yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
