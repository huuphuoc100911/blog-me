<?php

namespace Modules\CCategory\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\CCategory\src\Models\CCategory;
use Modules\CCategory\src\Repositories\CCategoryRepositoryInterface;

class CCategoryRepository extends BaseRepository implements CCategoryRepositoryInterface
{
    public function getModel()
    {
        return CCategory::class;
    }

    public function getCategories($limit = 20)
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->model->orderByDesc('updated_at')->paginate($limit);
    }
}
