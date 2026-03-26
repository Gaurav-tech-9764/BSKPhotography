@extends('layouts.app')
@section('title', 'Page Not Found')

@section('content')
<section class="py-5 text-center" style="min-height: 60vh; display:flex; align-items:center; justify-content:center;">
    <div>
        <h1 class="display-1 fw-bold" style="color: #c9a96e;">404</h1>
        <h2 class="mb-3">Page Not Found</h2>
        <p class="text-muted mb-4">The page you are looking for doesn't exist or has been moved.</p>
        <a href="{{ url('/') }}" class="btn btn-gold px-4 py-2">Back to Home</a>
    </div>
</section>
@endsection
