<?php

namespace App\Repositories;

use App\Models\clientOrder;
use App\Repositories\Contracts\ClientOrderRepositoryInterface;

class ClientOrderRepository implements ClientOrderRepositoryInterface
{
    protected $clientOrder;
    private $relation = ['client', 'product'];

    public function __construct(ClientOrder $clientOrder) {
        $this->clientOrder = $clientOrder;
    }

    public function create(array $data) {
        return $this->clientOrder->create($data);
    }

    public function update(int $id, array $data) {
        return $this->clientOrder->find($id)->update($data);
    }

    public function findAll() {
        return $this->clientOrder->with($this->relation)->get();
    }

    public function findById(int $id) {
        return $this->clientOrder->with($this->relation)->find($id);
    }

    public function delete(int $id) {
        return $this->clientOrder->find($id)->destroy($id);
    }
}
