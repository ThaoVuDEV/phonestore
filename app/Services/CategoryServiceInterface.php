<?php

namespace App\Services;

interface CategoryServiceInterface
{
    public function createCategory(array $data);
    public function updateCategory($categoryId, array $data);
    public function deleteCategory($categoryId);
    public function getAllCategories();
    public function getCategoryById($id);
    public function paginateCategories($perPage = 5, $columns = ['*']);
    public function trashCategoties();
}
