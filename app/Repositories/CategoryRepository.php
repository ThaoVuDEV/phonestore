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

    public function all()
    {
        return $this->category->all();
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
        return $this->category->find($id);
    }
    public function paginate($perPage = 5, $columns = ['*'])
    {
        return $this->category->paginate($perPage, $columns);
    }
    public function categories_trash()
    {
        return $this->category->onlyTrashed()->paginate(5);
    }
}
