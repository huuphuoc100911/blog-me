<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

abstract class BaseRepository implements RepositoryInterface
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
        return $this->model->all();
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

    public function paginate($items, $perPage = 20)
    {
        // Convert array to Laravel collection
        $collection = new Collection($items);

        // Get the current page from the query string or default to 1
        $page = request()->has('page') ? request()->query('page') : 1;

        // Paginate the collection
        $paginatedData = $collection->slice(($page - 1) * $perPage, $perPage)->all();

        return new LengthAwarePaginator(
            $paginatedData,
            count($collection),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
}
