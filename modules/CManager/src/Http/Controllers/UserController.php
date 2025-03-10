<?php

namespace Modules\CManager\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CManager\src\Http\Requests\CManagerRequest;
use Modules\CManager\src\Repositories\CManagerRepositoryInterface;

class UserController extends Controller
{
    protected $cManagerRepository;

    public function __construct(CManagerRepositoryInterface $cManagerRepository)
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

        return redirect()->route('manager.users.index')->with('msg', __('CManager::messages.create.success'));
    }

    public function edit($id)
    {
        $manager = $this->cManagerRepository->find($id);

        if (!$manager) {
            return abort(404);
        }

        return view('CManager::edit', compact('manager'));
    }

    public function update(CManagerRequest $request, $id)
    {
        $inputs = $request->except('_token', 'password');

        if ($request->password) {
            $inputs['password'] = bcrypt($request->password);
        }

        if ($this->cManagerRepository->update($id, $inputs)) {
            return redirect()->route('manager.users.index')->with('msg', __('CManager::messages.update.success'));
        }

        return redirect()->route('manager.users.index')->with('msg_fail', __('CManager::messages.update.failure'));
    }

    public function delete($id)
    {
        if ($this->cManagerRepository->delete($id)) {
            return back()->with('msg', __('CManager::messages.delete.success'));
        }

        return back()->with('msg_fail', __('CManager::messages.delete.failure'));
    }
}
