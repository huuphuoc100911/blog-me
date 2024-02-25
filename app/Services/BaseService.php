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
        return $this->model->limit(1)->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->model->find($id);

        if ($result) {
            return $result->update($attributes);
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->model->find($id);

        if ($result) {
            return $result->delete();
        }

        return false;
    }
}