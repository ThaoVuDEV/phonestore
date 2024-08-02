<?php

namespace App\Http\Controllers;

use App\Services\ColorService;
use Illuminate\Http\Request;

class ColorContrller extends Controller
{
    protected $colorService;
    public function __construct(ColorService $colorService)
    {
        $this->colorService = $colorService;
    }
    public function index()
    {
        $colors = $this->colorService->getAllColor();
        $title = "danh sách màu sắc";
        return view('admin.attributes.colors.list', compact('colors', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attributes.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'color_name' => 'required|string|max:255',
            'color_code' => 'required|string|max:7',
        ]);


        $this->colorService->createColor($request);

        return redirect()->route('color.index')->with('success', 'Thêm màu thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color = $this->colorService->getColorById($id);
        return view('admin.attributes.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'color_name' => 'required|string|max:255',
            'color_code' => 'required|string|max:255',
        ]);

        try {
            $this->colorService->updateColor($id, $validatedData);
            return redirect()->route('color.index')->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            return back()->withErrors(['color_name' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->colorService->deleteColor($id);
        return redirect()->route('colors.index')->with('success', 'Color deleted successfully.');
    }
}
