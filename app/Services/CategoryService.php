<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Exceptions\NotFoundException;

class CategoryService {

    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(array $data) {
        return $this->categoryRepository->create($data);
    }

    public function update(int $id, array $data) {
        $category = $this->findById($id);

        if(!$category) {
            throw new NotFoundException('Categoria');
        }

        return $this->categoryRepository->update($id, $data);
    }

    public function findAll() {
        return $this->categoryRepository->findAll();
    }

    public function findById(int $id) {
        $category = $this->categoryRepository->findById($id);

        if(!$category) {
            throw new NotFoundException('Categoria');
        }

        return $category;
    }

    public function delete(int $id) {
        $category = $this->findById($id);

        if(!$category) {
            throw new NotFoundException('Categoria');
        }

        return $this->categoryRepository->delete($id);
    }
}
