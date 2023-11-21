<?php

namespace Modules\Teacher\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Course\src\Repositories\CourseRepositoryInterface;
use Modules\Teacher\src\Http\Requests\TeacherRequest;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $teacherRepository;
    protected $courseRepository;

    public function __construct(
        TeacherRepositoryInterface $teacherRepository,
        CourseRepositoryInterface $courseRepository,

    ) {
        $this->teacherRepository = $teacherRepository;
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $teachers = $this->teacherRepository->getAllTeachers();

        return view('Teacher::list', compact('teachers'));
    }

    public function create()
    {
        return view('Teacher::create');
    }

    public function store(TeacherRequest $request)
    {
        $inputs = $request->except('_token');

        if ($request->avatar) {
            $inputs['avatar'] = $this->teacherRepository->uploadAvatar($request->avatar);
        }

        if ($this->teacherRepository->create($inputs)) {
            return redirect()->route('manager.teachers.index')->with('msg', __('messages.create.success'));
        }

        return redirect()->route('manager.teachers.index')->with('msg', __('messages.create.failure'));
    }

    public function edit($id)
    {
        $teacher = $this->teacherRepository->find($id);

        return view('Teacher::edit', compact('teacher'));
    }

    public function update(TeacherRequest $request, $id)
    {
        $inputs = $request->except('_token', '_method');

        if (isset($inputs['avatar'])) {
            $inputs['avatar'] = $this->teacherRepository->uploadAvatar($inputs['avatar'], $id);
        } else {
            $inputs = $request->except('_token', 'avatar');
        };

        if ($this->teacherRepository->update($id, $inputs)) {
            return redirect()->route('manager.teachers.index')->with('msg', __('messages.update.success'));
        }

        return redirect()->route('manager.teachers.index')->with('msg', __('messages.update.failure'));
    }

    public function delete($id)
    {
        $teacher = $this->teacherRepository->find($id);
        $this->courseRepository->deleteCourses($teacher->courses);

        $this->teacherRepository->uploadAvatar(null, $id);

        if ($this->teacherRepository->delete($id)) {
            return redirect()->route('manager.teachers.index')->with('msg', __('messages.delete.success'));
        }

        return redirect()->route('manager.teachers.index')->with('msg', __('messages.delete.failure'));
    }
}
