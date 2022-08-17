<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    protected $client;
    private $relation = 'addresses';

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function create(array $data) {
        return $this->client->create($data);
    }

    public function update(int $id, array $data) {
        return $this->client->findOrFail($id)->update($data);
    }

    public function findAll() {
        return $this->client->with($this->relation)->get();
    }

    public function findById(int $id) {
        return $this->client->with($this->relation)->findOrFail($id);
    }

    public function delete(int $id) {
        return $this->client->findOrFail($id)->destroy($id);
    }
}
