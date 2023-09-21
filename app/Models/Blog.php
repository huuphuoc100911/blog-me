<?php

namespace App\Models;

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
}
