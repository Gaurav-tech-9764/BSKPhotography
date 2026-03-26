@extends('layouts.admin')
@section('page-title', 'Testimonials')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Testimonials</h4>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Add Testimonial</a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Photo</th>
                        <th>Client Name</th>
                        <th>Designation</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration + ($testimonials->currentPage() - 1) * $testimonials->perPage() }}</td>
                            <td>
                                @if($testimonial->client_image)
                                    <img src="{{ asset('storage/' . $testimonial->client_image) }}" class="rounded-circle" style="width:40px;height:40px;object-fit:cover;" alt="">
                                @else
                                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white" style="width:40px;height:40px;"><i class="bi bi-person"></i></div>
                                @endif
                            </td>
                            <td>{{ $testimonial->client_name }}</td>
                            <td>{{ $testimonial->designation ?? '-' }}</td>
                            <td>
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star{{ $i <= $testimonial->rating ? '-fill text-warning' : '' }}"></i>
                                @endfor
                            </td>
                            <td>
                                @if($testimonial->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted py-4">No testimonials found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $testimonials->links() }}</div>
@endsection
