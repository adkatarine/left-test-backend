<?php

namespace App\Services;

use App\Repositories\Contracts\ClientOrderRepositoryInterface;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ClientOrderService {

    private $clientOrderRepository;

    public function __construct(ClientOrderRepositoryInterface $clientOrderRepository,
        ClientRepositoryInterface $clientRepository, ProductRepositoryInterface $productRepository ) {
        $this->clientOrderRepository = $clientOrderRepository;
        $this->clientRepository = $clientRepository;
        $this->productRepository = $productRepository;
    }

    public function create(array $data) {
        $client = $this->clientRepository->findById($data['client_id']);
        $product = $this->productRepository->findById($data['product_id']);

        if($client && $product) {
            if($product->quantity_stock >= $data['quantity']){
                $product->quantity_stock = $product->quantity_stock - $data['quantity'];
                $this->productRepository->update($product->id, ['quantity_stock' => $product->quantity_stock]);
                return $this->clientOrderRepository->create($data);
            }
        }
        #TODO: tratar erro
    }

    public function update(int $id, array $data) {
        $clientOrder = $this->findById($id);
        $client = $this->clientRepository->findById($data['client_id']);
        $product = $this->productRepository->findById($data['product_id']);

        if($client && $product) {
            $product->quantity_stock = $product->quantity_stock + $clientOrder->quantity;
            if($product->quantity_stock >= $data['quantity']){
                $product->quantity_stock = $product->quantity_stock - $data['quantity'];
                $this->productRepository->update($product->id, ['quantity_stock' => $product->quantity_stock]);
                return $this->clientOrderRepository->update($id, $data);
            }
        }
        #TODO: tratar erro
    }

    public function findAll() {
        return $this->clientOrderRepository->findAll();
    }

    public function findById(int $id) {
        return $this->clientOrderRepository->findById($id);
    }

    public function delete(int $id) {
        $clientOrder = $this->findById($id);
        $product = $this->productRepository->findById($clientOrder->product_id);

        $product->quantity_stock = $product->quantity_stock + $clientOrder->quantity;
        $this->productRepository->update($product->id, ['quantity_stock' => $product->quantity_stock]);
        return $this->clientOrderRepository->delete($id);
    }
}
