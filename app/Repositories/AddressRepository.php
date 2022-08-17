<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;

class AddressRepository implements AddressRepositoryInterface
{
    protected $address;

    public function __construct(Address $address) {
        $this->address = $address;
    }

    public function create(array $data) {
        return $this->address->create($data);
    }

    public function update(int $id, array $data) {
        return $this->address->find($id)->update($data);
    }

    public function findAll() {
        return $this->address->get();
    }

    public function findById(int $id) {
        return $this->address->find($id);
    }

    public function delete(int $id) {
        return $this->address->find($id)->destroy($id);
    }
}
