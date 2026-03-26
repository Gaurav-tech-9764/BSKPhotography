<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\ImageService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(private ImageService $imageService)
    {
    }

    public function edit()
    {
        $settings = Setting::getAll();
        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'nullable|string|max:191',
            'site_tagline' => 'nullable|string|max:191',
            'site_email' => 'nullable|email|max:191',
            'site_phone' => 'nullable|string|max:20',
            'site_address' => 'nullable|string|max:500',
            'footer_text' => 'nullable|string|max:500',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:2048',
            'site_favicon' => 'nullable|image|mimes:ico,png,jpg|max:512',
        ]);

        $textFields = ['site_name', 'site_tagline', 'site_email', 'site_phone', 'site_address', 'footer_text', 'meta_description', 'meta_keywords'];

        foreach ($textFields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field));
            }
        }

        if ($request->hasFile('site_logo')) {
            $oldLogo = Setting::get('site_logo');
            $this->imageService->delete($oldLogo);
            $result = $this->imageService->upload($request->file('site_logo'), 'settings');
            Setting::set('site_logo', $result['path']);
        }

        if ($request->hasFile('site_favicon')) {
            $oldFavicon = Setting::get('site_favicon');
            $this->imageService->delete($oldFavicon);
            $result = $this->imageService->upload($request->file('site_favicon'), 'settings');
            Setting::set('site_favicon', $result['path']);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated successfully.');
    }
}
