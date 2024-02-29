<?php

namespace App\Services\Helper;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

trait FilterTrait
{
    public function filterPaginate(
        $query,
        $limit = null,
        $searchConditions = [],
        $sortConditions = [],
        $searchable = [],
        $sortable = [],
        $columns = ['*'],
        $check = null,
        $checkOrderPlan = [],
        $getKeyColumn = null,
        &$getQuery = null
    ) {
        foreach ($searchConditions as $key => $value) {
            if (!isset($searchable[$key]) || $value === null) {
                continue;
            }

            call_user_func($searchable[$key], $query, $value);
        }

        $validDirections = ['ASC', 'DESC'];
        foreach ($sortConditions as $key => $value) {
            if (!isset($sortable[$key])) {
                continue;
            }

            if (is_string($sortable[$key])) {
                if ($sortable[$key] !== 'sortByDbField' || !in_array(strtoupper($value), $validDirections)) {
                    continue;
                }

                $query->orderBy($key, $value);
            } else {
                call_user_func($sortable[$key], $query, $value);
            }
        }

        if ($limit) {
            if ($check) {
                $getQuery = clone $query;
                $query = handleOrderWhereBy($query->get(), $check, $getKeyColumn);
                return $this->paginate($query, $limit);
            }

            if (!empty($checkOrderPlan)) {
                $getQuery = clone $query;
                $query = handleOrderPlanWhereBy($query->get(), $checkOrderPlan, $getKeyColumn);
                return $this->paginate($query, $limit);
            }

            $getQuery = clone $query;
            return $query->paginate($limit, $columns);
        }

        $getQuery = clone $query;
        $results = $query->get($columns);
        $total = $results->count();

        return new LengthAwarePaginator($results, $total, $total ?: 1, 1);
    }

    public function filterPaginate2(
        $query,
        $limit = null
    ) {
        $validDirections = ['ASC', 'DESC'];

        if ($limit) {
            $getQuery = clone $query;
            return $query->paginate($limit);
        }

        $results = $query->get();
        $total = $results->count();

        return new LengthAwarePaginator($results, $total, $total ?: 1, 1);
    }

    public function paginate($items, $limit = null, $page = null, $options = [])
    {
        $options['path'] = url()->current();
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $limit), $items->count(), $limit, $page, $options);
    }
}