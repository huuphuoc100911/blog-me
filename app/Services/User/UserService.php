<?php

namespace App\Services\User;

use App\Enums\BlogStatus;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\CommentBlog;
use App\Models\InfoCompany;
use App\Models\Media;
use App\Models\Staff;
use App\Models\User;
use App\Services\Helper\FilterTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mail;

class UserService extends BaseService
{
    use FilterTrait;

    public function __construct(
        User $model,
        Staff $staff,
        InfoCompany $infoCompany,
        Blog $blog,
        Category $category,
        Media $media,
        BlogCategory $blogCategory,
        CommentBlog $commentBlog
    ) {
        $this->model = $model;
        $this->staff = $staff;
        $this->infoCompany = $infoCompany;
        $this->blog = $blog;
        $this->category = $category;
        $this->media = $media;
        $this->blogCategory = $blogCategory;
        $this->commentBlog = $commentBlog;
    }

    public function registerUser($inputs)
    {
        return $this->model->create([
            'name' => $inputs['username'],
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password']),
        ]);
    }

    public function getListStaff()
    {
        return $this->staff->get();
    }

    public function getInfoCompany()
    {
        return $this->infoCompany->findOrFail(1);
    }

    public function getListBlogActive($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        $query = $this->blog->whereNull('deleted_at')
            ->where('is_active', BlogStatus::ACTIVE)
            ->orderByDesc('id');

        return $this->filterPaginate(
            $query,
            $limit,
            $filters,
            $sorts,
            $filterable,
            $select
        );
    }

    public function getBlogOther($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->blog->whereNull('deleted_at')
            ->where('id', '!=', $filters)
            ->where('is_active', BlogStatus::ACTIVE)
            ->orderByDesc('id')->take(6)->get();
    }

    public function getBlogDetail($id)
    {
        return $this->blog->findOrFail($id);
    }

    public function getUserProfile()
    {
        return $this->model->findOrFail(auth()->user()->id);
    }

    public function updateUserProfile($inputs)
    {
        $userId = auth()->user()->id;
        $user = $this->model->findOrFail($userId);

        $data = [
            'name' => $inputs['name'],
            'phone_number' => $inputs['phone_number'],
            'birth_day' => Carbon::parse($inputs['birth_day']),
            'address' => $inputs['address'],
            'province_id' => $inputs['province'],
            'district_id' => $inputs['district'],
            'ward_id' => $inputs['ward'],
        ];

        return $user->update($data);
    }

    public function updateAvatar($inputs)
    {
        $user = $this->model->findOrFail(auth()->user()->id);
        $path = Storage::put('user/avatar', $inputs['url_image']);
        $data['url_image'] = $path;

        if ($user->url_image) {
            Storage::delete($user->url_image);
        }

        return $user->update($data);
    }

    public function sendEmail($inputs)
    {
        try {
            //Send mail
            $dataMail = [
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'url' => url('contact'),
            ];

            $name = $inputs['name'];
            $mail = $inputs['email'];


            Mail::send('user.mail', $dataMail, function ($message) use ($mail) {
                $message->to($mail);
                $subject = "Xin chào";

                $message->subject($subject);
            });

            return true;
        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }

    public function testQuery()
    {
        $userCount = DB::table('users')
            ->select(DB::raw('count(*) as user_count, is_active'))
            ->where('is_active', '=', 2)
            ->groupBy('is_active')
            ->get();

        $categoryMedia = DB::table('categories')
            ->selectRaw('categories.title as category_title, count(*) as media_count')
            ->join('medias', 'medias.category_id', '=', 'categories.id')
            ->groupBy('categories.id', 'categories.title')
            ->get();

        // $mediaByDay = Media::selectRaw('DAY(created_at) as c, COUNT(id) as amount')
        //     ->groupByRaw('DAY(created_at)')
        //     // ->havingRaw('DAY(created_at) > 10')
        //     ->orderByDesc('DAY(created_at)', 'desc')
        //     ->get();

        $a = 10;

        $users = DB::table('medias')
            // ->select('medias.id as media_id', 'categories.id as category_id', 'medias.title as media_title', 'medias.description as media_description')
            // ->join('categories', 'categories.id', '=', 'medias.category_id')
            // ->where('id', '<', 10)
            // ->where(function ($query) use ($a) {
            //     $query->where('id', '>', $a)
            //         ->orWhere('id', '<', $a);
            // })
            // ->select(DB::raw('count(medias.category_id) as category_count'), 'categories.title as category_title')
            // ->having('category_count', '>', 1)
            // ->groupBy('medias.category_id', 'categories.title')

            // ->selectRaw('count(medias.category_id) as category_count, categories.title as category_title')
            // ->havingRaw('count(medias.category_id) > 1')

            // ->where('category_id', '=', function ($query) {
            //     $query->select('id')->from('categories')->where('id', 1);
            // })

            // ->where('medias.title', 'like', '%ai%')
            ->get();
        dd($users);

        return [
            'userCount' => $userCount,
            'categoryMedia' => $categoryMedia,
        ];
    }

    public function testRelationship()
    {
        $blog = $this->blog->find(9);

        $users = $blog->users;
        foreach ($users as $user) {
            echo $user->pivot->created_at . '<br/>';
        }
        // dd($users);
    }
}