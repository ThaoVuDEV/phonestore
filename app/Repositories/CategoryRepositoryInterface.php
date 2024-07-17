<?php

namespace App\Repositories;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update(Category $category, array $data);

    public function delete(Category $category);
     public function paginate($perPage = 5, $columns = ['*']);
     public function categories_trash ();
}
