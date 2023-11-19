<?php

namespace Modules\Course\src\Repositories;

use App\Repositories\BaseRepository;
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

    public function uploadAvatar($image, $id = null)
    {
        if ($id) {
            $course = $this->find($id);

            Storage::delete($course->thumbnail);
        }

        return Storage::put('manager/courses', $image);
    }
}
