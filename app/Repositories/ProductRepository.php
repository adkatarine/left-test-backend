<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    protected $product;
    private $relation = 'category';

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function create(array $data) {
        return $this->product->create($data);
    }

    public function update(int $id, array $data) {
        return $this->product->findOrFail($id)->update($data);
    }

    public function findAll() {
        return $this->product->with($this->relation)->get();
    }

    public function findById(int $id) {
        return $this->product->with($this->relation)->findOrFail($id);
    }

    public function delete(int $id) {
        return $this->product->findOrFail($id)->destroy($id);
    }
}
