<?php

namespace App\Services\Staff;

use App\Models\Module;
use App\Services\Helper\FilterTrait;

class ModuleService extends BaseService
{
    use FilterTrait;

    public function __construct(Module $model)
    {
        $this->model = $model;
    }

    public function getListModules($limit = 20)
    {
        return $this->model->get();
    }
}
