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

    public function findAll(string $relation = '') {
        if(!empty($relation)){
            $this->client->with($relation)->get();
        }
        return $this->client->get();
    }

    public function findById(int $id, string $relation = '') {
        if(!empty($relation)){
            return $this->client->with($relation)->findOrFail($id);
        }
        return $this->client->findOrFail($id);
    }

    public function delete(int $id) {
        return $this->client->findOrFail($id)->destroy($id);
    }
}
