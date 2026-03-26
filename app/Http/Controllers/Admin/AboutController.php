<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Services\ImageService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(private ImageService $imageService)
    {
    }

    public function edit()
    {
        $about = About::first() ?? new About();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:191',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'experience' => 'nullable|string|max:191',
            'achievements' => 'nullable|string',
            'story' => 'nullable|string',
        ]);

        $about = About::first();

        if ($request->hasFile('image')) {
            if ($about) {
                $this->imageService->delete($about->image);
            }
            $result = $this->imageService->upload($request->file('image'), 'about');
            $validated['image'] = $result['path'];
        }

        if ($about) {
            $about->update($validated);
        } else {
            About::create($validated);
        }

        return redirect()->route('admin.about.edit')->with('success', 'About page updated successfully.');
    }
}
