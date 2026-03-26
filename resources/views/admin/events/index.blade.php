@extends('layouts.admin')
@section('page-title', 'Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Events</h4>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Add Event</a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Cover</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration + ($events->currentPage() - 1) * $events->perPage() }}</td>
                            <td>
                                @if($event->cover_image)
                                    <img src="{{ asset('storage/' . $event->cover_image) }}" class="img-thumbnail-sm" alt="">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->event_date ? $event->event_date->format('M d, Y') : '-' }}</td>
                            <td>{{ $event->location ?? '-' }}</td>
                            <td>
                                @if($event->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this event?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted py-4">No events found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $events->links() }}</div>
@endsection
