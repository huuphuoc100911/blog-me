<?php

namespace Modules\Lesson\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Course\src\Repositories\CourseRepositoryInterface;

class LessonController extends Controller
{
    protected $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function show($courseId)
    {
        $course = $this->courseRepository->find($courseId);

        return view('Lesson::list', compact('course'));
    }
}
