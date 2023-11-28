<?php

namespace App\Models;

use App\Enums\MediaStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medias';

    protected $fillable = [
        'staff_id',
        'category_id',
        'type',
        'title',
        'url_image',
        'description',
        'priority',
        'video_url',
        'is_active',
        'is_favorite',
        'deleted_at'
    ];

    public function getImageUrlAttribute()
    {
        return $this->url_image ? Storage::url($this->url_image) : '';
    }

    public function getUrlVideoAttribute()
    {
        return $this->video_url ? Storage::url($this->video_url) : '';
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', MediaStatus::ACTIVE);
    }
}
