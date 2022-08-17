<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function findAll();
    public function findById(int $id);
    public function delete(int $id);
}
