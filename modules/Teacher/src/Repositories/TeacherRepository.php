<?php

namespace Modules\Teacher\src\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
use Modules\Teacher\src\Models\Teacher;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;

class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface
{
    public function getModel()
    {
        return Teacher::class;
    }

    public function getAllTeachers($limit = 20)
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->model->paginate($limit);
    }

    public function uploadAvatar($avatar, $id = null)
    {
        if ($id) {
            $teacher = $this->find($id);

            Storage::delete($teacher->avatar);
        }

        if (isset($avatar)) {
            return Storage::put('manager/teachers', $avatar);
        }

        return false;
    }
}
