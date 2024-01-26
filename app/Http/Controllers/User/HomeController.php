<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserProfileRequest;
use App\Models\InfoCompany;
use App\Models\Media;
use App\Services\User\AddressService;
use App\Services\User\CategoryService;
use App\Services\User\CommentService;
use App\Services\User\MediaService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Session;

class HomeController extends Controller
{
    public function __construct(
        MediaService $mediaService,
        CategoryService $categoryService,
        UserService $userService,
        CommentService $commentService,
        AddressService $addressService
    ) {
        $this->mediaService = $mediaService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
        $this->commentService = $commentService;
        $this->addressService = $addressService;
    }

    public function index()
    {
        // Cache::put('domain', 'localhost', 600);
        // Cache::get('domain');
        $medias = $this->mediaService->getListMedia();
        $categories = $this->categoryService->getListCategory();
        $infoCompany = InfoCompany::findOrFail(1);


        return view('user.index', compact('medias', 'categories', 'infoCompany'));
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
        $provinces = $this->addressService->getAllProvincePluck();
        $districts = $this->addressService->getAllDistrictPluck();
        $wards = $this->addressService->getAllWardPluck();
        $userProfile = $this->userService->getUserProfile();

        return view('user.info-account', compact('userProfile', 'provinces', 'districts', 'wards'));
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

    public function testQuery()
    {
        $data = $this->userService->testQuery();
        // dd($data);

        return view('user.test-query', compact('data'));
    }

    public function testRelationship()
    {
        $data = $this->userService->testRelationship();
        // dd($data);

        // return view('user.test-query', compact('data'));
    }

    public function downloadImage($id)
    {
        return response()->download(public_path((Media::findOrFail($id)->imageUrl)));
    }
}
