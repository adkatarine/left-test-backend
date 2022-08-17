<?php

namespace App\Services;

use App\Repositories\Contracts\ClientRepositoryInterface;
use App\Exceptions\NotFoundException;
use App\Exceptions\IntegrityConstraintViolationException;

class ClientService {

    private $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function create(array $data) {
        return $this->clientRepository->create($data);
    }

    public function update(int $id, array $data) {
        $client = $this->findById($id);

        if(!$client) {
            throw new NotFoundException('Cliente');
        }

        return $this->clientRepository->update($id, $data);
    }

    public function findAll() {
        return $this->clientRepository->findAll();
    }

    public function findById(int $id) {
        $client = $this->clientRepository->findById($id);

        if(!$client) {
            throw new NotFoundException('Cliente');
        }

        return $client;
    }

    public function delete(int $id) {
        $client = $this->findById($id);

        if(!$client) {
            throw new NotFoundException('Cliente');
        }

        try {
            $user = $this->clientRepository->delete($id);
        } catch (\Illuminate\Database\QueryException $e) {
            throw new IntegrityConstraintViolationException('cliente');
        }

        return $user;
    }
}
