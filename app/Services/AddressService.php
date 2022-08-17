<?php

namespace App\Services;

use App\Repositories\Contracts\AddressRepositoryInterface;

class AddressService {

    private $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository) {
        $this->addressRepository = $addressRepository;
    }

    public function create(array $data) {
        return $this->addressRepository->create($data);
    }

    public function update(int $id, array $data) {
        return $this->addressRepository->update($id, $data);
    }

    public function findAll() {
        return $this->addressRepository->findAll();
    }

    public function findById(int $id) {
        return $this->addressRepository->findById($id);
    }

    public function delete(int $id) {
        return $this->addressRepository->delete($id);
    }
}
