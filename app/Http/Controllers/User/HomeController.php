<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\CategoryService;
use App\Services\User\MediaService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(MediaService $mediaService, CategoryService $categoryService, UserService $userService)
    {
        $this->mediaService = $mediaService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
    }

    public function index()
    {
        $medias = $this->mediaService->getListMedia();
        $categories = $this->categoryService->getListCategory();

        return view('user.index', compact('medias', 'categories'));
    }

    public function about()
    {
        $staffs = $this->userService->getListStaff();

        return view('user.about', compact('staffs'));
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
        $medias = $this->mediaService->getListMedia();
        $categories = $this->categoryService->getListCategory();

        return view("user.portfolio", compact("medias", "categories"));
    }

    public function contact()
    {
        $infoCompany = $this->userService->getInfoCompany();

        return view('user.contact', compact("infoCompany"));
    }
}
