<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryService {

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(array $data) {
        return $this->categoryRepository->create($data);
    }

    public function update(int $id, array $data) {
        return $this->categoryRepository->update($id, $data);
    }

    public function findAll() {
        return $this->categoryRepository->findAll();
    }

    public function findById(int $id) {
        return $this->categoryRepository->findById($id);
    }

    public function delete(int $id) {
        return $this->categoryRepository->delete($id);
    }
}
