<?php

namespace Modules\CCategory\src\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    public function deleteCategoryCourse($categoryId)
    {
        DB::beginTransaction();

        try {
            $category = $this->find($categoryId);
            $subCategory = $this->model->where('parent_id', $categoryId)->get();

            $category->courses()->detach();
            $this->delete($categoryId);

            if ($subCategory) {
                foreach ($subCategory as $category) {
                    $this->deleteCategoryCourse($category->id);
                }
            }

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);

            return false;
        }
    }
}
