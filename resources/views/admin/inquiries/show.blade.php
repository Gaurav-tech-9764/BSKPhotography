@extends('layouts.admin')
@section('page-title', 'View Inquiry')

@section('content')
<div class="card border-0 shadow-sm" style="border-radius: 12px; max-width: 700px;">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <h5 class="mb-0">{{ $inquiry->subject ?? 'No Subject' }}</h5>
            @if(!$inquiry->is_read)
                <form action="{{ route('admin.inquiries.mark-read', $inquiry) }}" method="POST">
                    @csrf @method('PATCH')
                    <button class="btn btn-sm btn-success"><i class="bi bi-check2 me-1"></i>Mark as Read</button>
                </form>
            @else
                <span class="badge bg-secondary">Read</span>
            @endif
        </div>
        <hr>
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Name:</strong>
                <p class="mb-0">{{ $inquiry->name }}</p>
            </div>
            <div class="col-md-6">
                <strong>Email:</strong>
                <p class="mb-0"><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></p>
            </div>
        </div>
        @if($inquiry->phone)
        <div class="mb-3">
            <strong>Phone:</strong>
            <p class="mb-0"><a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a></p>
        </div>
        @endif
        <div class="mb-3">
            <strong>Message:</strong>
            <div class="p-3 bg-light rounded mt-1" style="white-space: pre-wrap;">{{ $inquiry->message }}</div>
        </div>
        <div class="text-muted small">
            Received: {{ $inquiry->created_at->format('F d, Y \a\t h:i A') }}
        </div>
        <hr>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Back</a>
            <a href="mailto:{{ $inquiry->email }}?subject=Re: {{ $inquiry->subject }}" class="btn btn-primary"><i class="bi bi-reply me-1"></i> Reply via Email</a>
            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" onsubmit="return confirm('Delete this inquiry?')">
                @csrf @method('DELETE')
                <button class="btn btn-outline-danger"><i class="bi bi-trash me-1"></i> Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
