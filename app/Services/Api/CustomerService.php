<?php

namespace App\Services\Api;

use App\Models\Customer;
use App\Services\Helper\FilterTrait;

class CustomerService extends BaseService
{
    use FilterTrait;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    public function getListCustomer($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = config('common.default_per_page');

        $query = $this->model;

        return $this->filterPaginate(
            $query,
            $limit,
            $filters,
            $sorts,
            $filterable,
            $select
        );
    }

    public function getCustomer($id)
    {
        return $this->model->whereId($id)->first();
    }

    public function createCustomer($inputs)
    {
        return $this->model->create($inputs);
    }
}
