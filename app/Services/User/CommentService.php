<?php

namespace App\Services\User;

use App\Models\CommentBlog;
use App\Models\ReplyComment;
use App\Services\Helper\FilterTrait;

class CommentService extends BaseService
{
    use FilterTrait;

    public function __construct(CommentBlog $model, ReplyComment $replyComments)
    {
        $this->model = $model;
        $this->replyComments = $replyComments;
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

    public function postReplyComment($inputs)
    {
        $data = [
            'comment_id' => $inputs['comment_id'],
            'user_id' => auth('user')->user()->id,
            'reply' => $inputs['reply']
        ];

        return $this->replyComments->create($data);
    }

    public function getListCommentBlog($blogId, $filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $query = $this->model->where('blog_id', $blogId);

        return $this->filterPaginate(
            $query,
            $limit,
            $filters,
            $sorts,
            $filterable,
            $select
        );
    }
}
