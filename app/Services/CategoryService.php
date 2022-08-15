<?php

namespace App\Services;

use App\Repositories\Contracts\BaseRepositoryInterface;

class CategoryService {

    private $categoryRepository;

    public function __construct(BaseRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(array $data) {
        return $this->categoryRepository->create($data);
    }

    public function update(int $id, array $data) {
        return $this->categoryRepository->update($id, $data);
    }

    public function findAll(string $relation = '') {
        return $this->categoryRepository->findAll($relation);
    }

    public function findById(int $id, string $relation = '') {
        return $this->categoryRepository->findById($id, $relation);
    }

    public function delete(int $id) {
        return $this->categoryRepository->delete($id);
    }
}
