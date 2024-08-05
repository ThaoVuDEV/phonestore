<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function all($parentId = null)
    {
        // Lấy tất cả các danh mục chưa bị xóa mềm và lọc theo parent_id nếu được cung cấp
        return $this->category
            ->whereNull('deleted_at')
            ->when($parentId, function ($query, $parentId) {
                // Nếu parentId được cung cấp, lọc theo parent_id
                return $query->where('parent_id', $parentId);
            }, function ($query) {
                // Nếu không có parentId, lọc các danh mục mà parent_id không phải null
                return $query->whereNotNull('parent_id');
            })
            ->get();
    }

    public function create($data)
    {
        return $this->category->create($data);
    }

    public function update(Category $category, $data)
    {
        return $category->update($data);
    }

    public function delete(Category $category)
    {
        return $category->delete();
    }

    public function find($id)
    {
        // Tìm danh mục theo ID, chỉ những danh mục chưa bị xóa mềm
        return $this->category->whereNull('deleted_at')->find($id);
    }

    public function paginate($perPage = 10, $columns = ['*'], $searchTerm = null)
    {
        // Phân trang các danh mục chưa bị xóa mềm
        $query = $this->category->whereNull('deleted_at');
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
        return $query->paginate($perPage, $columns);
    }

    public function categories_trash()
    {
        // Lấy các danh mục đã bị xóa mềm
        return $this->category->onlyTrashed()->paginate(5);
    }
   
}
