<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    protected $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function create(array $data) {
        return $this->client->create($data);
    }

    public function update(int $id, array $data) {
        return $this->client->findOrFail($id)->update($data);
    }

    public function findAll(string $relation) {
        return $this->client->with($relation)->get();
    }

    public function findById(int $id, string $relation) {
        return $this->client->with($relation)->findOrFail($id);
    }

    public function delete(int $id) {
        return $this->client->findOrFail($id)->destroy($id);
    }
}
