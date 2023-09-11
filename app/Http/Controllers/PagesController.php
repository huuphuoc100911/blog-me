<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function view($any = null)
    {
        return view('app');
    }
}
