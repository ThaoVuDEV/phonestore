<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use App\Services\ProductAttributeService;

class AttributeController extends Controller
{
    protected $attributeService;
    public function __construct(ProductAttributeService $attributeService)
    {
        $this->attributeService  = $attributeService;
    }
    public function index(Request $request)
    {   if($request->ajax()){
        $seartchTerm = $request->input('search');
        $attributes = $this->attributeService->paginateAttributes(10,['*'],$seartchTerm);
        return view('admin.attributes.partials.list', compact('attributes'))->render();
    }

        $title = 'Danh sách biến thể';
        $attributes = $this->attributeService->paginateAttributes(10);
        return view('admin.attributes.list', compact('attributes', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attributes.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'attribute_name' => 'required|string|max:255',
        ], [
            'attribute_name.required' => 'Vui lòng nhập tên!!!',
            'attribute_name.string' => 'Vui lòng nhập phải là ký tự',
            'attribute_name.max' => 'Không nhập quá 255',
        ]);
        try {
            $attributeData = [
                'name' => $request->input('attribute_name'),
            ];
            $this->attributeService->createAttribute($attributeData);
            return redirect()->route('attributes.index')->with('success', 'Thêm biến thể mới thành công');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Đã xảy ra lỗi khi thêm mới danh mục. Vui lòng thử lại sau.']);
        }
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
        $attribute = $this->attributeService->getAttributeById($id);
        return view('admin.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'attribute_name' => 'required|string|max:255',
        ], [
            'attribute_name.string' => 'Vui lòng nhập phải là ký tự',
            'attribute_name.max' => 'Không nhập quá 255',
        ]);
        try {
            $attribute = $this->attributeService->getAttributeById($id);
            if (!$attribute) {
                return redirect()->route('attributes.index')->with('error', 'Không tìm thấy biến thể.');
            }
            $attributeData = [];
            if ($request->has('attribute_name') && $request->filled('attribute_name')) {
                $attributeData['name'] = $request->input('attribute_name');
            } else {
                $attributeData['name'] = $attribute->value;
            }

            $this->attributeService->updateAttribute($attribute, $attributeData);
            return redirect()->route('attributes.index')->with('success', 'Cập nhật biến thể thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Đã xảy ra lỗi khi cập nhật biến thể. Vui lòng thử lại sau.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attribute = $this->attributeService->getAttributeById($id);
        if (!$attribute) {
            return redirect()->route('attributes.index')->with('error', 'Không tìm thấy biến thể!!');
        }
        $this->attributeService->deleteAttribute($id);
        return redirect()->route('attributes.index')->with('success', 'Xóa thành công!!');
    }
    public function attributes_trash(Request $request)
    {
        $attributes = $this->attributeService->trashAttributes();
        $title = 'Danh sách danh mục đã xóa';
        return view('admin.attributes.list', compact('attributes', 'title'));
    }
    public function attributes_restore(string $id)
    {
        $category = ProductAttribute::withTrashed()->findOrFail($id);

        $category->restore();

        return redirect()->route('attributes.index')
            ->with('success', 'Khôi phục danh mục thành công.');
    }
   
}
