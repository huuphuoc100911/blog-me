<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function about()
    {
        return view('user.about');
    }

    public function blog()
    {
        return view('user.blog');
    }

    public function blogDetail()
    {
        return view('user.blog-detail');
    }

    public function service()
    {
        return view('user.service');
    }

    public function pricing()
    {
        return view('user.pricing');
    }

    public function portfolio()
    {
        return view("user.portfolio");
    }

    public function contact()
    {
        return view('user.contact');
    }
}
