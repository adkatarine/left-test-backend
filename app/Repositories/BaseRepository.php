<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface {

    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function update(int $id, array $data) {
        return $this->model->findOrFail($id)->update($data);
    }

    public function findAll(string $relation = '') {
        if(!empty($relation)){
            $this->model->with($relation)->get();
        }
        return $this->model->get();
    }

    public function findById(int $id, string $relation = '') {
        if(!empty($relation)){
            return $this->model->with($relation)->findOrFail($id);
        }
        return $this->model->findOrFail($id);
    }

    public function delete(int $id) {
        return $this->model->findOrFail($id)->destroy($id);
    }
}
