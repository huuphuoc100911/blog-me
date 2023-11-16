<?php

namespace Modules\CManager\src\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('CManager::list');
    }
}
