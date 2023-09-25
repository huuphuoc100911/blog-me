<?php

namespace App\Services\User;

use App\Models\CommentBlogs;
use App\Services\Helper\FilterTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CommentService extends BaseService
{
    use FilterTrait;

    public function __construct(CommentBlogs $model)
    {
        $this->model = $model;
    }

    public function postBlogComment($inputs)
    {
        $data = [
            'blog_id' => $inputs['blogId'],
            'user_id' => auth('user')->user()->id,
            'comment' => $inputs['comment']
        ];

        return $this->model->create($data);
    }
}
