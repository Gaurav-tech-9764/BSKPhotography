<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::active()->withCount('images')->latest('event_date')->paginate(12);
        return view('public.events', compact('events'));
    }

    public function show(Event $event)
    {
        $event->load('images');
        return view('public.event-detail', compact('event'));
    }
}
