<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    protected $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function create(array $data) {
        return $this->product->create($data);
    }

    public function update(int $id, array $data) {
        return $this->product->findOrFail($id)->update($data);
    }

    public function findAll(string $relation) {
        return $this->product->with($relation)->get();
    }

    public function findById(int $id, string $relation) {
        return $this->product->with($relation)->findOrFail($id);
    }

    public function delete(int $id) {
        return $this->product->findOrFail($id)->destroy($id);
    }
}
