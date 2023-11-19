<?php

namespace Modules\Course\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CCategory\src\Repositories\CCategoryRepository;
use Modules\Course\src\Http\Requests\CourseRequest;
use Modules\Course\src\Repositories\CourseRepository;

class CourseController extends Controller
{
    protected $courseRepository;
    protected $ccategoryRepository;

    public function __construct(CourseRepository $courseRepository, CCategoryRepository $ccategoryRepository)
    {
        $this->courseRepository = $courseRepository;
        $this->ccategoryRepository = $ccategoryRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->getCourses();

        return view('Course::list', compact('courses'));
    }

    public function create()
    {
        $categories = $this->ccategoryRepository->getAllCategoryPluck();

        return view('Course::create', compact('categories'));
    }

    public function store(CourseRequest $request)
    {
        $inputs = $request->all();

        if ($request->thumbnail) {
            $inputs['thumbnail'] = $this->courseRepository->uploadAvatar($request->thumbnail);
        }

        if ($this->courseRepository->create($inputs)) {
            return redirect()->route('manager.courses.index')->with('msg', __('messages.create.success'));
        }

        return redirect()->route('manager.courses.index')->with('msg', __('messages.create.failure'));
    }

    public function edit($id)
    {
        $course = $this->courseRepository->find($id);
        $categories = $this->ccategoryRepository->getAllCategoryPluck();

        return view('Course::edit', compact('course', 'categories'));
    }

    public function update(CourseRequest $request, $id)
    {
        $inputs = $request->except('_token');

        if ($inputs['thumbnail']) {
            $inputs['thumbnail'] = $this->courseRepository->uploadAvatar($inputs['thumbnail'], $id);
        } else {
            $inputs = $request->except('_token', 'thumbnail');
        }

        if ($this->courseRepository->update($id, $inputs)) {
            return redirect()->route('manager.courses.index')->with('msg', __('messages.update.success'));
        }

        return redirect()->route('manager.courses.index')->with('msg', __('messages.update.failure'));
    }

    public function delete($id)
    {
        if ($this->courseRepository->delete($id)) {
            return redirect()->route('manager.courses.index')->with('msg', __('messages.delete.success'));
        }

        return redirect()->route('manager.courses.index')->with('msg', __('messages.delete.failure'));
    }
}
