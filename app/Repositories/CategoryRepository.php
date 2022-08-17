<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function create(array $data) {
        return $this->category->create($data);
    }

    public function update(int $id, array $data) {
        return $this->category->findOrFail($id)->update($data);
    }

    public function findAll() {
        return $this->category->get();
    }

    public function findById(int $id) {
        return $this->category->findOrFail($id);
    }

    public function delete(int $id) {
        return $this->category->findOrFail($id)->destroy($id);
    }
}
