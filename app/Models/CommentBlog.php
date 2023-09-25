<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CommentBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'user_id',
        'comment',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replyComment()
    {
        return $this->hasMany(ReplyComment::class, 'comment_id', 'id');
    }

    public function commentFavorite()
    {
        return $this->hasMany(CommentFavorite::class, 'comment_id', 'id');
    }

    public function favorite()
    {
        return $this->hasMany(CommentFavorite::class, 'comment_id', 'id')->where('user_id', auth('user')->user()->id);
    }
}
