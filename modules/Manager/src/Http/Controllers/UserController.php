<?php

namespace Modules\Manager\src\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        return view('Manager::list');
    }
}
