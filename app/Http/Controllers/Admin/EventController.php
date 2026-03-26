<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventImage;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function __construct(private ImageService $imageService)
    {
    }

    public function index()
    {
        $events = Event::withCount('images')->latest('event_date')->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:191',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            $result = $this->imageService->upload($request->file('cover_image'), 'events');
            $validated['cover_image'] = $result['path'];
        }

        unset($validated['images']);
        $event = Event::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $result = $this->imageService->upload($file, 'events');
                EventImage::create([
                    'event_id' => $event->id,
                    'image_path' => $result['path'],
                ]);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        $event->load('images');
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:191',
            'description' => 'nullable|string',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:191',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('cover_image')) {
            $this->imageService->delete($event->cover_image);
            $result = $this->imageService->upload($request->file('cover_image'), 'events');
            $validated['cover_image'] = $result['path'];
        }

        unset($validated['images']);
        $event->update($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $result = $this->imageService->upload($file, 'events');
                EventImage::create([
                    'event_id' => $event->id,
                    'image_path' => $result['path'],
                ]);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $this->imageService->delete($event->cover_image);
        foreach ($event->images as $image) {
            $this->imageService->delete($image->image_path);
        }
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }

    public function deleteImage(EventImage $image)
    {
        $this->imageService->delete($image->image_path);
        $eventId = $image->event_id;
        $image->delete();

        return redirect()->route('admin.events.edit', $eventId)->with('success', 'Image deleted.');
    }
}
