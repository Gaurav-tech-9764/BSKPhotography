@extends('layouts.admin')
@section('page-title', 'Social Links')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Social Links</h4>
    <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Add Link</a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Icon</th>
                        <th>Platform</th>
                        <th>URL</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($socialLinks as $link)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration }}</td>
                            <td><i class="bi bi-{{ $link->icon ?? 'link-45deg' }} fs-5"></i></td>
                            <td>{{ $link->platform }}</td>
                            <td><a href="{{ $link->url }}" target="_blank" class="text-truncate d-inline-block" style="max-width:250px;">{{ $link->url }}</a></td>
                            <td>
                                @if($link->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.social-links.edit', $link) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">No social links yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
