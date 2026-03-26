@extends('layouts.admin')
@section('page-title', 'Portfolio')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex align-items-center gap-3">
        <h4 class="mb-0">Portfolio Images</h4>
        <form class="d-flex gap-2">
            <select name="category_id" class="form-select form-select-sm" style="width:200px;" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Upload Images</a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 12px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Featured</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($images as $image)
                        <tr>
                            <td class="ps-4">{{ $loop->iteration + ($images->currentPage() - 1) * $images->perPage() }}</td>
                            <td><img src="{{ asset('storage/' . ($image->thumbnail_path ?? $image->image_path)) }}" class="img-thumbnail-sm" alt=""></td>
                            <td>{{ $image->title ?? '-' }}</td>
                            <td><span class="badge bg-info text-dark">{{ $image->category->name ?? '-' }}</span></td>
                            <td>
                                @if($image->is_featured)
                                    <i class="bi bi-star-fill text-warning"></i>
                                @else
                                    <i class="bi bi-star text-muted"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.portfolio.edit', $image) }}" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.portfolio.destroy', $image) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this image?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">No images found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="mt-3">{{ $images->appends(request()->query())->links() }}</div>
@endsection
