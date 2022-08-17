<?php

namespace App\Services;

use App\Repositories\Contracts\ClientOrderRepositoryInterface;
use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Exceptions\NotFoundException;
use App\Exceptions\QuantityInsuficienteException;
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

        if(!$client || !$product) {
            throw new NotFoundException('Cliente e|ou Produto');
        }

        if($product->quantity_stock < $data['quantity']){
            throw new QuantityInsuficienteException();
        }

        $product->quantity_stock = $product->quantity_stock - $data['quantity'];
        $this->productRepository->update($product->id, ['quantity_stock' => $product->quantity_stock]);
        return $this->clientOrderRepository->create($data);
    }

    public function update(int $id, array $data) {
        $clientOrder = $this->findById($id);
        $client = $this->clientRepository->findById($data['client_id']);
        $product = $this->productRepository->findById($data['product_id']);

        if(!$client || !$product || !$clientOrder) {
            throw new NotFoundException('Cliente, Produto e|ou Pedido');
        }

        $product->quantity_stock = $product->quantity_stock + $clientOrder->quantity;

        if($product->quantity_stock < $data['quantity']){
            throw new QuantityInsuficienteException();
        }

        $product->quantity_stock = $product->quantity_stock - $data['quantity'];
        $this->productRepository->update($product->id, ['quantity_stock' => $product->quantity_stock]);
        return $this->clientOrderRepository->update($id, $data);
    }

    public function findAll() {
        return $this->clientOrderRepository->findAll();
    }

    public function findById(int $id) {
        $clientOrder = $this->clientOrderRepository->findById($id);

        if(!$clientOrder) {
            throw new NotFoundException('Pedido');
        }

        return $clientOrder;
    }

    public function delete(int $id) {
        $clientOrder = $this->findById($id);

        if(!$clientOrder) {
            throw new NotFoundException('Pedido');
        }

        $product = $this->productRepository->findById($clientOrder->product_id);

        $product->quantity_stock = $product->quantity_stock + $clientOrder->quantity;
        $this->productRepository->update($product->id, ['quantity_stock' => $product->quantity_stock]);
        return $this->clientOrderRepository->delete($id);
    }
}
