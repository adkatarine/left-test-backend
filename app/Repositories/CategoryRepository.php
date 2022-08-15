<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository {

    protected Category $model;

    public function __construct(Category $model) {
        $this->model = $model;
    }
}
