<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index() {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }
    
    public function create() {
        return view('admin.banners.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
            'link' => 'nullable|url',
            'status' => 'boolean'
        ]);
    
        $imagePath = $request->file('image')->store('banners', 'public');
    
        Banner::create([
            'title' => $request->input('title'),
            'image' => $imagePath,
            'link' => $request->input('link'),
            'status' => $request->input('status', true)
        ]);
    
        return redirect()->route('banners.index')->with('success', 'Banner created successfully!');
    }
}
