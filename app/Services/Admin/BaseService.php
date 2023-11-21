<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Storage;

abstract class BaseService
{
    protected $model;

    // public function __construct()
    // {
    //     $this->setModel();
    // }

    // public function setModel()
    // {
    //     $this->model = new $this->model;
    // }

    // public function getModel()
    // {
    //     return $this->model;
    // }

    public function findModel($id)
    {
        return $this->model->find($id);
    }

    public function createModel($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function updateModel($attributes = [], $result)
    {
        return $result->update($attributes);
    }

    public function uploadFile($file, $folder, $pathDelete = null)
    {
        if ($pathDelete) {
            Storage::delete($pathDelete);
        }

        return Storage::put($folder, $file);
    }
}
