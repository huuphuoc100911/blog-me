<?php

namespace App\Services;


abstract class BaseService implements ServiceInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    abstract public function getModel();

    public function getAll()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($attributes = [], $id)
    {
        $result = $this->model->findOrFail($id);

        if ($result) {
            return $result->update($attributes);
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->model->findOrFail($id);

        if ($result) {
            return $result->delete();
        }

        return false;
    }
}
