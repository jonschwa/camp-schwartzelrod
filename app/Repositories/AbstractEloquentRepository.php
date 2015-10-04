<?php

namespace App\Repositories;

abstract class AbstractEloquentRepository
{
    public function all()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->where('id', '=', $id)->get();
    }

    public function create($params)
    {
        $create = $this->model->create($params);
        return $create;
    }
}