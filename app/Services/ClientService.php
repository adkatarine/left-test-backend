<?php

namespace App\Services;

use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientService {

    private $clientRepository;
    private $relation = 'addresses';

    public function __construct(ClientRepositoryInterface $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function create(array $data) {
        return $this->clientRepository->create($data);
    }

    public function update(int $id, array $data) {
        return $this->clientRepository->update($id, $data);
    }

    public function findAll() {
        return $this->clientRepository->findAll($this->relation);
    }

    public function findById(int $id) {
        return $this->clientRepository->findById($id, $this->relation);
    }

    public function delete(int $id) {
        return $this->clientRepository->delete($id);
    }
}
