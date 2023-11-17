<?php

namespace Modules\CManager\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CManager\src\Http\Requests\CManagerRequest;
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

    public function store(CManagerRequest $request)
    {
        $inputs = $request->all();

        $this->cManagerRepository->create([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'group_id' => $inputs['group_id'],
            'password' => bcrypt($inputs['password']),
        ]);

        return redirect()->route('manager.user.index')->with('msg', __('CManager::messages.success'));
    }
}
