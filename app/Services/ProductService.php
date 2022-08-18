<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\NotFoundException;
use App\Exceptions\IntegrityConstraintViolationException;

class ProductService {

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function create(array $data) {
        $category = $this->categoryRepository->findById($data['category_id']);

        if(!$category) {
            throw new NotFoundException('Categoria');
        }

        if (array_key_exists('image', $data)) {
            $image = $data["image"];
            $data["image"] = $image->store('images', 'public');
        }
        return $this->productRepository->create($data);
    }

    public function update(int $id, array $data) {
        $category = $this->categoryRepository->findById($data['category_id']);
        $product = $this->findById($id);

        if(!$product || !$category) {
            throw new NotFoundException('Produto e|ou Categoria');
        }

        if($product->image && array_key_exists('image', $data)) {
            Storage::disk('public')->delete($product->image);
        }

        if (array_key_exists('image', $data)) {
            $image = $data["image"];
            $data["image"] = $image->store('images', 'public');
        }

        return $this->productRepository->update($id, $data);
    }

    public function findAll() {
        return $this->productRepository->findAll();
    }

    public function findById(int $id) {
        $product = $this->productRepository->findById($id);

        if(!$product) {
            throw new NotFoundException('Produto');
        }

        return $product;
    }

    public function delete(int $id) {
        $product = $this->findById($id);

        if(!$product) {
            throw new NotFoundException('Produto');
        }

        try {
            $product = $this->productRepository->delete($id);
        } catch (\Illuminate\Database\QueryException $e) {
            throw new IntegrityConstraintViolationException('produto');
        }

        Storage::disk('public')->delete($product->image);

        return $product;
    }
}
