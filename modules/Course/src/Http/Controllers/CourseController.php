<?php

namespace Modules\Course\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Modules\CCategory\src\Repositories\CCategoryRepository;
use Modules\Course\src\Http\Requests\CourseRequest;
use Modules\Course\src\Repositories\CourseRepository;
use Modules\Teacher\src\Repositories\TeacherRepository;

class CourseController extends Controller
{
    protected $courseRepository;
    protected $ccategoryRepository;
    protected $teacherRepository;

    public function __construct(
        CourseRepository $courseRepository,
        CCategoryRepository $ccategoryRepository,
        TeacherRepository $teacherRepository,
    ) {
        $this->courseRepository = $courseRepository;
        $this->ccategoryRepository = $ccategoryRepository;
        $this->teacherRepository = $teacherRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->getCourses();

        return view('Course::list', compact('courses'));
    }

    public function create()
    {
        $categoriesMany = $this->ccategoryRepository->getAllCategories();
        $teachers = $this->teacherRepository->getAllTeachersPluck();

        return view('Course::create', compact('categoriesMany', 'teachers'));
    }

    public function store(CourseRequest $request)
    {
        $inputs = $request->all();

        if ($request->thumbnail) {
            $inputs['thumbnail'] = $this->courseRepository->uploadAvatar($request->thumbnail);
        }

        $categories = $this->courseRepository->getCategories($inputs['categories']);

        $course = $this->courseRepository->create($inputs);

        if ($this->courseRepository->createCategoriesCourses($course, $categories)) {
            return redirect()->route('manager.courses.index')->with('msg', __('messages.create.success'));
        }

        return redirect()->route('manager.courses.index')->with('msg', __('messages.create.failure'));
    }

    public function edit($id)
    {
        $course = $this->courseRepository->find($id);
        $teachers = $this->teacherRepository->getAllTeachersPluck();

        // Lấy ra các category_id của khóa học 
        $categoryIds = $this->courseRepository->getRelatedCategory($course);

        // Hiển thị tất cả danh mục
        $categoriesMany = $this->ccategoryRepository->getAllCategories();

        return view('Course::edit', compact('course', 'categoriesMany', 'categoryIds', 'teachers'));
    }

    public function update(CourseRequest $request, $id)
    {
        $inputs = $request->except('_token', '_method');

        if (isset($inputs['thumbnail'])) {
            $inputs['thumbnail'] = $this->courseRepository->uploadAvatar($inputs['thumbnail'], $id);
        } else {
            $inputs = $request->except('_token', 'thumbnail');
        }

        $this->courseRepository->update($id, $inputs);
        $course = $this->courseRepository->find($id);
        $categories = $this->courseRepository->getCategories($inputs['categories']);

        if ($this->courseRepository->updateCategoriesCourses($course, $categories)) {
            return redirect()->route('manager.courses.index')->with('msg', __('messages.update.success'));
        }

        return redirect()->route('manager.courses.index')->with('msg', __('messages.update.failure'));
    }

    public function delete($id)
    {
        $course = $this->courseRepository->find($id);
        $this->courseRepository->deleteCategoriesCourses($course);
        $this->courseRepository->uploadAvatar(null, $id);

        if ($this->courseRepository->delete($id)) {
            return redirect()->route('manager.courses.index')->with('msg', __('messages.delete.success'));
        }

        return redirect()->route('manager.courses.index')->with('msg', __('messages.delete.failure'));
    }
}