<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use App\Exceptions\NotFoundException;

class ProductService {

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function create(array $data) {
        if (array_key_exists('image', $data)) {
            $image = $data["image"];
            $data["image"] = $image->store('images', 'public');
        }
        return $this->productRepository->create($data);
    }

    public function update(int $id, array $data) {
        $product = $this->findById($id);

        if(!$product) {
            throw new NotFoundException('Produto');
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

        Storage::disk('public')->delete($product->image);

        return $this->productRepository->delete($id);
    }
}
