<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;

class InquiryController extends Controller
{
    public function index()
    {
        $inquiries = ContactInquiry::latest()->paginate(20);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(ContactInquiry $inquiry)
    {
        if (!$inquiry->is_read) {
            $inquiry->update(['is_read' => true]);
        }
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function destroy(ContactInquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted successfully.');
    }

    public function markAsRead(ContactInquiry $inquiry)
    {
        $inquiry->update(['is_read' => true]);
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry marked as read.');
    }
}
