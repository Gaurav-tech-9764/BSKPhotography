@extends('layouts.admin')
@section('page-title', 'Contact Inquiries')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Contact Inquiries</h4>
    <span class="badge bg-danger fs-6">{{ $inquiries->where('is_read', false)->count() }} Unread</span>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($inquiries as $inquiry)
                        <tr class="{{ !$inquiry->is_read ? 'table-light fw-semibold' : '' }}">
                            <td class="ps-4">{{ $loop->iteration + ($inquiries->currentPage() - 1) * $inquiries->perPage() }}</td>
                            <td>{{ $inquiry->name }}</td>
                            <td>{{ $inquiry->email }}</td>
                            <td>{{ Str::limit($inquiry->subject ?? 'No Subject', 30) }}</td>
                            <td>{{ $inquiry->created_at->format('M d, Y H:i') }}</td>
                            <td>
                                @if($inquiry->is_read)
                                    <span class="badge bg-secondary">Read</span>
                                @else
                                    <span class="badge bg-warning text-dark">Unread</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-eye"></i></a>
                                <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this inquiry?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted py-4">No inquiries yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $inquiries->links() }}</div>
@endsection
