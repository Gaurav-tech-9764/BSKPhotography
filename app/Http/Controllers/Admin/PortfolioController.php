<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioImage;
use App\Services\ImageService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct(private ImageService $imageService)
    {
    }

    public function index(Request $request)
    {
        $query = PortfolioImage::with('category')->orderBy('sort_order');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $images = $query->paginate(20);
        $categories = Category::active()->orderBy('name')->get();

        return view('admin.portfolio.index', compact('images', 'categories'));
    }

    public function create()
    {
        $categories = Category::active()->orderBy('name')->get();
        return view('admin.portfolio.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'nullable|string|max:191',
            'description' => 'nullable|string',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
            'is_featured' => 'boolean',
        ]);

        foreach ($request->file('images') as $file) {
            $result = $this->imageService->upload($file, 'portfolio', true);
            PortfolioImage::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'image_path' => $result['path'],
                'thumbnail_path' => $result['thumbnail'] ?? null,
                'is_featured' => $request->boolean('is_featured'),
            ]);
        }

        return redirect()->route('admin.portfolio.index')->with('success', 'Images uploaded successfully.');
    }

    public function edit(PortfolioImage $portfolio)
    {
        $categories = Category::active()->orderBy('name')->get();
        return view('admin.portfolio.edit', compact('portfolio', 'categories'));
    }

    public function update(Request $request, PortfolioImage $portfolio)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'nullable|string|max:191',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'is_featured' => 'boolean',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $this->imageService->delete($portfolio->image_path);
            $this->imageService->delete($portfolio->thumbnail_path);
            $result = $this->imageService->upload($request->file('image'), 'portfolio', true);
            $validated['image_path'] = $result['path'];
            $validated['thumbnail_path'] = $result['thumbnail'] ?? null;
        }

        unset($validated['image']);
        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')->with('success', 'Image updated successfully.');
    }

    public function destroy(PortfolioImage $portfolio)
    {
        $this->imageService->delete($portfolio->image_path);
        $this->imageService->delete($portfolio->thumbnail_path);
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')->with('success', 'Image deleted successfully.');
    }
}
