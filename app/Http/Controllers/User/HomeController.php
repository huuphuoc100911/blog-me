<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserProfileRequest;
use App\Services\User\CategoryService;
use App\Services\User\CommentService;
use App\Services\User\MediaService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Session;

class HomeController extends Controller
{
    public function __construct(
        MediaService $mediaService,
        CategoryService $categoryService,
        UserService $userService,
        CommentService $commentService
    ) {
        $this->mediaService = $mediaService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
        $this->commentService = $commentService;
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
        $blogs = $this->userService->getListBlogActive();

        return view('user.blog', compact('blogs'));
    }

    public function blogDetail($slug, $id)
    {
        $blogs = $this->userService->getBlogOther(array($id));
        $blogDetail = $this->userService->getBlogDetail($id);
        $commentBlog = $this->commentService->getListCommentBlog($id);

        return view('user.blog-detail', compact('blogDetail', 'blogs', 'commentBlog'));
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

    public function infoAccount()
    {
        $userProfile = $this->userService->getUserProfile();

        return view('user.info-account', compact('userProfile'));
    }

    public function updateProfile(UserProfileRequest $request)
    {
        if ($this->userService->updateUserProfile($request->all())) {
            return redirect()->back()->with('update_success',  __('messages.update_success'));
        }

        return redirect()->back()->with('update_fail',  __('messages.update_fail'));
    }

    public function updateAvatar(Request $request)
    {
        if ($this->userService->updateAvatar($request->all())) {
            return redirect()->back()->with('update_avatar_success', "Cập nhật hình nền thành công");
        }

        return redirect()->back()->with('update_fail',  __('messages.update_fail'));
    }

    public function sendEmail(Request $request)
    {
        if ($this->userService->sendEmail($request->all())) {
            return redirect()->back()->with('send_email_success', __('messages.send_email_success'));
        } else {
            return redirect()->back()->with('send_email_fail', __('messages.send_email_fail'));
        }
    }

    public function locale($locale)
    {
        if (!in_array($locale, ['en', 'vi', 'ja'])) {
            abort(400);
        }

        App::setLocale($locale);
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
