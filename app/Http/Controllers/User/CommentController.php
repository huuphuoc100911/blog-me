<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\CommentService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function blogComment(Request $request)
    {
        $comment = $this->commentService->postBlogComment($request->all());
        Carbon::setLocale('vi');
        $urlImage = $comment->user->image_url == '' ? "https://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" : $comment->user->image_url;

        $checkAutor = auth('user')->user()->email === $comment->user->email;

        $classByAutor =  $checkAutor ? 'by-author' : '';

        if ($comment) {
            return response()->json([
                'comment' => '<li class="mt-4 comment-id-' . $comment->id . '">
                <div class="comment-main-level">
                    <div class="comment-avatar"><img
                            src="' . $urlImage . '"
                            alt=""></div>
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name ' . $classByAutor . '">' . $comment->user->name . '</h6>
                            <span>' . Carbon::parse($comment->updated_at)->diffForHumans(Carbon::now()) . '</span>
                            <i class="fa fa-reply" onclick=handleAddReply(' . $comment->id . ')></i>
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="comment-content">' . $comment->comment . '
                        </div>
                    </div>
                </div>
                <ul class="comments-list reply-list reply-' . $comment->id . '">
                </ul>
            </li>'
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }

    public function replyComment(Request $request)
    {
        $replyComment = $this->commentService->postReplyComment($request->all());
        Carbon::setLocale('vi');
        $urlImage = $replyComment->user->image_url == '' ? "https://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" : $replyComment->user->image_url;
        $checkAutor = auth('user')->user()->email === $replyComment->user->email;

        $classByAutor =  $checkAutor ? 'by-author' : '';

        if ($replyComment) {
            return response()->json([
                'reply' => '<li>
                <div class="comment-avatar"><img
                        src="' . $urlImage . '"
                        alt=""></div>
                <div class="comment-box">
                    <div class="comment-head">
                        <h6 class="comment-name ' . $classByAutor . '">' . $replyComment->user->name . '</h6>
                        <span>' . Carbon::parse($replyComment->updated_at)->diffForHumans(Carbon::now()) . '</span>
                        <i class="fa fa-heart"></i>
                    </div>
                    <div class="comment-content">
                    ' . $replyComment->reply . '
                    </div>
                </div>
            </li>'
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }

    public function commentFavorite(Request $request)
    {
        $favoriteComment = $this->commentService->postCommentFavorite($request->all());

        if ($favoriteComment === true) {
            return response()->json([
                'status' => 'not_favorite'
            ]);
        }

        return response()->json([
            'status' => 'is_favorite'
        ]);
    }
}
