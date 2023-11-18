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

    public function getAllCategories()
    {
        return $this->model->orderByDesc('updated_at')->get();
    }

    public function getTreeCategories()
    {
        return $this->model->with('subCategories')->where('parent_id', 0)->get();
    }

    public function getAllCategoryPluck()
    {
        return $this->model->orderByDesc('updated_at')->pluck('name', 'id');
    }
}
