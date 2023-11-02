<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'title',
        'url_image',
        'description',
        'is_active',
    ];

    public function getImageUrlAttribute()
    {
        return $this->url_image ? Storage::url($this->url_image) : '';
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function comment()
    {
        return $this->hasManyThrough(
            CommentBlog::class, //Model muốn liên kết
            Blog::class,   // Model trung gian.
            'category_id', // Khóa ngoại của bảng trung gian
            'blog_id', // khoá ngoại của bảng đích
            'id', // Khóa chính cảu bảng nguồn
            'id' // khóa chính của bảng trung gian
        );
    }
}
