<?php

namespace Modules\CStudent\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CStudent\src\Models\TestModuleUser;
use Modules\CStudent\src\Repositories\CStudentRepository;

class CStudentController extends Controller
{
    protected $cstudentRepo;

    public function __construct(CStudentRepository $cstudentRepo)
    {
        $this->cstudentRepo = $cstudentRepo;
    }

    public function index()
    {
        $testModuleUser = $this->cstudentRepo->getCStudentPaginate();

        return view('CStudent::list', compact('testModuleUser'));
    }

    public function show($id)
    {
        return view('CStudent::detail', compact('id'));
    }

    public function create()
    {
        $testModuleUser = new TestModuleUser();

        $testModuleUser->name = 'HuuPhuoc' . rand(1, 100);
        $testModuleUser->save();
    }
}
