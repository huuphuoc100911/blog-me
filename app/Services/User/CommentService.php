<?php

namespace App\Services\User;

use App\Models\CommentBlog;
use App\Models\CommentFavorite;
use App\Models\ReplyComment;
use App\Services\Helper\FilterTrait;
use Illuminate\Support\Facades\Log;

class CommentService extends BaseService
{
    use FilterTrait;

    public function __construct(CommentBlog $model, ReplyComment $replyComments, CommentFavorite $commentFavorite)
    {
        $this->model = $model;
        $this->replyComments = $replyComments;
        $this->commentFavorite = $commentFavorite;
    }

    public function postBlogComment($inputs)
    {
        $data = [
            'blog_id' => $inputs['blogId'],
            'user_id' => auth()->user()->id,
            'comment' => $inputs['comment']
        ];

        return $this->model->create($data);
    }

    public function postReplyComment($inputs)
    {
        $data = [
            'comment_id' => $inputs['comment_id'],
            'user_id' => auth()->user()->id,
            'reply' => $inputs['reply']
        ];

        return $this->replyComments->create($data);
    }

    public function postCommentFavorite($inputs)
    {
        $data = [
            'comment_id' => $inputs['comment_id'],
            'user_id' => auth()->user()->id,
        ];

        $favoriteComment = $this->commentFavorite->where($data)->first();

        if ($favoriteComment) {
            return $favoriteComment->delete();
        } else {
            return $this->commentFavorite->create($data);
        }
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
