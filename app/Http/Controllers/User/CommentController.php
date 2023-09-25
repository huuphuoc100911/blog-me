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

        if ($comment) {
            return response()->json([
                'comment' => '<li class="mt-4 comment-id-' . $comment->id . '">
                <div class="comment-main-level">
                    <div class="comment-avatar"><img
                            src="' . $comment->user->image_url . '"
                            alt=""></div>
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name">' . $comment->user->name . '</h6>
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

        if ($replyComment) {
            return response()->json([
                'reply' => '<li>
                <div class="comment-avatar"><img
                        src="' . $replyComment->user->image_url . '"
                        alt=""></div>
                <div class="comment-box">
                    <div class="comment-head">
                        <h6 class="comment-name">' . $replyComment->user->name . '</h6>
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
}
