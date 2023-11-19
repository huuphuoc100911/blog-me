<?php

namespace Modules\Course\src\Repositories;

use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Modules\Course\src\Models\Course;
use Modules\Course\src\Repositories\CourseRepositoryInterface;

class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{
    public function getModel()
    {
        return Course::class;
    }

    public function getCourses($limit = 20)
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->model->paginate($limit);
    }

    public function createCategoriesCourses($course, $data)
    {
        //attach thêm vào bảng trung gian
        return $course->categories()->attach($data);
    }

    public function updateCategoriesCourses($course, $data)
    {
        //Sync xóa hết rồi insert lại
        return $course->categories()->sync($data);
    }

    public function deleteCategoriesCourses($course)
    {
        //Sync xóa hết rồi insert lại
        return $course->categories()->detach();
    }

    public function getRelatedCategory($course)
    {
        return $course->categories()->allRelatedIds()->toArray();
    }

    public function getCategories($categories)
    {
        $categoryCheck = [];

        foreach ($categories as $category) {
            $categoryCheck[$category] = ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        }

        return $categoryCheck;
    }

    public function uploadAvatar($image, $id = null)
    {
        if ($id) {
            $course = $this->find($id);

            Storage::delete($course->thumbnail);
        }

        if (isset($image)) {
            return Storage::put('manager/courses', $image);
        }

        return false;
    }
}
