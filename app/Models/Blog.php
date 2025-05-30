<?php

namespace App\Models;

use App\Enums\BlogStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'staff_id',
        'title',
        'url_image',
        'description',
        'content',
        'priority',
        'is_active',
        'is_favorite',
        'deleted_at'
    ];

    public function getImageUrlAttribute()
    {
        return $this->url_image ? Storage::url($this->url_image) : '';
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function comment()
    {
        return $this->hasMany(CommentBlog::class, 'blog_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'comment_blogs',
            'blog_id',
            'user_id'
        )->withPivot('created_at', 'comment');
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', BlogStatus::ACTIVE);
    }
}
