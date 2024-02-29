<?php

namespace App\Services;

interface ServiceInterface
{
    public function getAll();

    public function find($id);

    public function create($attributes = []);

    public function update($attributes = [], $id);

    public function delete($id);
}
