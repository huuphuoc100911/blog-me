<?php

namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\src\Models\TestModuleUser;

class UserController extends Controller
{
    public function index()
    {
        return view('User::list');
    }

    public function show($id)
    {
        return view('User::detail', compact('id'));
    }

    public function create()
    {
        $testModuleUser = new TestModuleUser();

        $testModuleUser->name = 'HuuPhuoc' . rand(1, 100);
        $testModuleUser->save();
    }
}
