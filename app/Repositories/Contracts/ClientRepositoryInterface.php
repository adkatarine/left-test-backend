<?php

namespace App\Repositories\Contracts;

interface ClientRepositoryInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function findAll(string $relation = '');
    public function findById(int $id, string $relation = '');
    public function delete(int $id);
}
