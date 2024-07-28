<?php

namespace App\Http\Controllers;

use App\Services\ProductAttributeDetailService;
use App\Services\ProductAttributeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AttributeDetailController extends Controller
{
    protected $attributeDetailService;
    protected $attributeService;
    public function __construct(ProductAttributeDetailService $attributeDetailService,ProductAttributeService $attributeService)
    {
        $this->attributeDetailService = $attributeDetailService;
        $this->attributeService= $attributeService;
    }
    public function index($id)
    {
        $attributeDetail = $this->attributeDetailService->getAttributeDetailByForeignKey($id);
        return view('admin.attributes.show', compact('attributeDetail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $attributeService = $this->attributeService->getAttributeById($id);
        return view('admin.attributes.create_detail',compact('attributeService'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'attribute_id' => 'required|exists:product_attributes,id',
            'attribute_value' => 'required|string|max:255',
        ], [
            'attribute_id.required' => 'Vui lòng chọn thuộc tính.',
            'attribute_id.exists' => 'Thuộc tính không tồn tại.',
            'attribute_value.required' => 'Vui lòng nhập giá trị biến thể.',
            'attribute_value.string' => 'Giá trị biến thể phải là một chuỗi.',
            'attribute_value.max' => 'Giá trị biến thể không được vượt quá 255 ký tự.',
        ]);
    
        try {
            $attributeDetail = [
                'product_attribute_id' => $request->input('attribute_id'),
                'value' => $request->input('attribute_value'),
            ];
            $this->attributeDetailService->createAttributeDetail($attributeDetail);
            return redirect()->route('attributes.index')->with('success', 'Thêm chi tiết thuộc tính thành công.');
        } catch (\Exception $e) {
            Log::error('Error in AttributeDetailController@store: ' . $e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'Đã xảy ra lỗi khi thêm chi tiết thuộc tính.']);
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
        $attributeDetail = $this->attributeDetailService->getAttributesDetailById($id);
        $previousUrl = url()->previous();
        return view('admin.attributes.edit_detail', compact('attributeDetail','previousUrl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'attribute_detail_value' => 'nullable|string|max:255'
        ], [
            'attribute_detail_value.string' => 'Vui lòng nhập đúng dữ liệu',
            'attribute_detail_value.max' => 'Vui lòng nhập dưới 255 ký tự',
        ]);

        try {
            $attributeDetail = $this->attributeDetailService->getAttributesDetailById($id);
            if(!$attributeDetail){
                return redirect()->route('attributeDetail.show')->with('error', 'Không tìm thấy biến thể.');
            }
            $attributeDetailData = [];
            if ($request->has('attribute_detail_value') && $request->filled('attribute_detail_value')) {
                $attributeDetailData['value'] = $request->input('attribute_detail_value');
            }else{
                $attributeDetailData['value'] = $attributeDetail->value;
            }
            $this->attributeDetailService->updateAttributeDetail($attributeDetail, $attributeDetailData);

            return redirect()->route('attributeDetail.show', ['id' => $attributeDetail->product_attribute_id])->with('success', 'Đã cập nhật thành công');
        } catch (\Exception $e) {

            return redirect()->back()->withInput()->withErrors(['error' => 'Đã xảy ra lỗi. Vui lòng thử lại sau.']);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attribute = $this->attributeDetailService->getAttributesDetailById($id);
        if(!$attribute){
            return redirect()->route('attributes.index')->with('error','Không tìm thấy biến thể!!');
        }
        $this->attributeDetailService->deleteAttributesDetailByID($id);
        return redirect()->route('attributes.index')->with('success','Xóa thành công!!');
    }
}
