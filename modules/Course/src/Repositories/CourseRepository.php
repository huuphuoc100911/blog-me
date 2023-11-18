<?php

namespace Modules\Course\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\CCategory\src\Models\CCategory;
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
}
