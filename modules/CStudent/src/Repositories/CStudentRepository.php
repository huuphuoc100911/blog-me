<?php

namespace Modules\CStudent\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\CStudent\src\Models\TestModuleUser;
use Modules\CStudent\src\Repositories\CStudentRepositoryInterface;

class CStudentRepository extends BaseRepository implements CStudentRepositoryInterface
{
    public function getModel()
    {
        return TestModuleUser::class;
    }

    public function getCStudent($limit = 10)
    {
        return $this->model->limit($limit)->get();
    }

    public function getCStudentPaginate()
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->model->orderByDesc('id')->paginate($limit);
    }
}
