<?php

namespace Modules\Dashboard\src\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Dashboard::dashboard');
    }
}
