<?php

namespace Modules\CManager\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CManager\src\Repositories\CManagerRepository;

class UserController extends Controller
{
    protected $cManagerRepository;

    public function __construct(CManagerRepository $cManagerRepository)
    {
        $this->cManagerRepository = $cManagerRepository;
    }

    public function index()
    {
        $managers = $this->cManagerRepository->getCManagers();

        return view('CManager::list', compact('managers'));
    }

    public function create()
    {
        return view('CManager::create');
    }
}
