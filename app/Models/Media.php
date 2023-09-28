<?php

namespace App\Models;

use App\Enums\MediaStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $table = 'medias';

    protected $fillable = [
        'category_id',
        'type',
        'title',
        'url_image',
        'description',
        'priority',
        'is_active',
        'is_favorite',
        'deleted_at'
    ];

    public function getImageUrlAttribute()
    {
        return $this->url_image ? Storage::url($this->url_image) : '';
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
