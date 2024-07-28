<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {   if($request->ajax()){
        $searchTerm = $request->input('search');
        $categories = $this->categoryService->paginateCategories(10, ['*'], $searchTerm);
        return view('admin.categories.partials.list', compact('categories'))->render();
    }
        $categories = $this->categoryService->paginateCategories(10);
        $title = 'Danh sách danh mục';
        return view('admin.categories.list', compact('categories', 'title'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAllCategories(); // Lấy tất cả danh mục để chọn danh mục cha
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $categoryData = [
                'name' => $request->input('category_name'),
                'parent_id' => $request->input('parent_id') // Thêm trường danh mục cha
            ];

            $this->categoryService->createCategory($categoryData);

            return redirect()->route('categories.index')->with('success', 'Thêm mới danh mục thành công');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Đã xảy ra lỗi khi thêm mới danh mục. Vui lòng thử lại sau.']);
        }
    }

    public function edit(string $id)
    {
        $category = $this->categoryService->getCategoryById($id);
        $categories = $this->categoryService->getAllCategories(); // Lấy tất cả danh mục để chọn danh mục cha
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id' // Validate danh mục cha
        ]);

        try {
            $category = $this->categoryService->getCategoryById($id);
            if (!$category) {
                return redirect()->route('categories.index')->with('error', 'Không tìm thấy danh mục.');
            }

            $categoryData = [
                'name' => $request->input('category_name'),
                'parent_id' => $request->input('parent_id') // Thêm trường danh mục cha
            ];

            $this->categoryService->updateCategory($category, $categoryData);

            return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Đã xảy ra lỗi khi cập nhật danh mục. Vui lòng thử lại sau.']);
        }
    }

    public function destroy(string $id)
    {
        $category = $this->categoryService->getCategoryById($id);

        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Không tìm thấy danh mục.');
        }

        $this->categoryService->deleteCategory($category);
        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công.');
    }

    public function categories_trash(Request $request)
    {
        $categories = $this->categoryService->trashCategoties();
        $title = 'Danh sách danh mục đã xóa';
        return view('admin.categories.list', compact('categories', 'title'));
    }

    public function restore(string $id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        $category->restore();

        return redirect()->route('categories.index')
            ->with('success', 'Khôi phục danh mục thành công.');
    }
}
