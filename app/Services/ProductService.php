<?php

namespace App\Services;

use App\Repositories\Contracts\BaseRepositoryInterface;

class ProductService {

    private $productRepository;

    public function __construct(BaseRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function create(array $data) {
        $image = $data["image"];
        $data["image"] = $image->store('images', 'public');
        return $this->productRepository->create($data);
    }

    public function update(int $id, array $data) {
        $image = $data["image"];
        $data["image"] = $image->store('images', 'public');
        return $this->productRepository->update($id, $data);
    }

    public function findAll(string $relation = '') {
        return $this->productRepository->findAll($relation);
    }

    public function findById(int $id, string $relation = '') {
        return $this->productRepository->findById($id, $relation);
    }

    public function delete(int $id) {
        return $this->productRepository->delete($id);
    }
}
