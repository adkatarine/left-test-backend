<?php

namespace App\Services;

use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientService {

    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function create(array $data) {
        return $this->clientRepository->create($data);
    }

    public function update(int $id, array $data) {
        return $this->clientRepository->update($id, $data);
    }

    public function findAll(string $relation = '') {
        return $this->clientRepository->findAll($relation);
    }

    public function findById(int $id, string $relation = '') {
        return $this->clientRepository->findById($id, $relation);
    }

    public function delete(int $id) {
        return $this->clientRepository->delete($id);
    }
}
