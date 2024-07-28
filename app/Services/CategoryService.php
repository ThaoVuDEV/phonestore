<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAllCategories()
    {
        return $this->categoryRepo->all();
    }

    public function createCategory($data)
    {
        return $this->categoryRepo->create($data);
    }

    public function updateCategory($category, $data)
    {
        return $this->categoryRepo->update($category, $data);
    }

    public function deleteCategory($category)
    {
        return $this->categoryRepo->delete($category);
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepo->find($id);
    }

    public function paginateCategories($perPage = 5, $columns = ['*'],$searchTerm = null)
    {
        return $this->categoryRepo->paginate($perPage, $columns,$searchTerm);
    }

    public function trashCategoties()
    {
        return $this->categoryRepo->categories_trash();
    }

    public function storeCategory($request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id' // Validate danh mục cha
        ], [
            'category_name.required' => 'Vui lòng nhập tên!!!',
            'category_name.string' => 'Vui lòng nhập phải là ký tự',
            'category_name.max' => 'Không nhập quá 255',
            'parent_id.exists' => 'Danh mục cha không tồn tại.'
        ]);

        $categoryData = [
            'name' => $request->input('category_name'),
            'parent_id' => $request->input('parent_id') // Thêm trường danh mục cha
        ];

        return $this->createCategory($categoryData);
    }
}
