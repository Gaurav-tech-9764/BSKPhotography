<?php

namespace App\Http\Controllers;

use App\Mail\NewInquiryMail;
use App\Models\ContactInquiry;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    public function index()
    {
        return view('public.contact');
    }

    public function store(Request $request)
    {
        $key = 'contact-form:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->with('error', 'Too many submissions. Please try again later.');
        }
        RateLimiter::hit($key, 300);

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:191',
            'message' => 'required|string|max:2000',
        ]);

        $inquiry = ContactInquiry::create($validated);

        $ownerEmail = Setting::get('site_email');
        if ($ownerEmail) {
            try {
                Mail::to($ownerEmail)->send(new NewInquiryMail($inquiry));
            } catch (\Exception $e) {
                // Log but don't show error to user
                \Log::error('Failed to send inquiry email: ' . $e->getMessage());
            }
        }

        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
