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

    public function paginateCategories($perPage = 5, $columns = ['*'])
    {
        return $this->categoryRepo->paginate($perPage, $columns);
    }
    public function trashCategoties()
    {
        return $this->categoryRepo->categories_trash();
    }
}
