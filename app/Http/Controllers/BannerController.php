<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index() {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }
    
    public function create() {
        return view('admin.banners.create');
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
           
        ]);

        $path = $request->file('image')->store('banners', 'public');

        Banner::create([
            'title' => $request->input('title'),
            'image' => $path,
            'link' => $request->input('link'),
            'status' => 1,
        ]);

        return redirect()->route('banners.index')->with('success', 'Banner added successfully!');
    }
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        $banner->title = $request->input('title');
        $banner->link = $request->input('link');
        $banner->description = $request->input('description');

        if ($request->hasFile('image')) {
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }

            $path = $request->file('image')->store('banners', 'public');
            $banner->image = $path;
        }

        $banner->save();

        return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
    }
}
