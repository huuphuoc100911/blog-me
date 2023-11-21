<?php

namespace App\Models;

use App\Enums\CategoryStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'admin_id',
        'staff_id',
        'title',
        'url_image',
        'description',
        'priority',
        'is_active',
        'is_accept',
    ];

    public function getImageUrlAttribute()
    {
        return $this->url_image ? Storage::url($this->url_image) : '';
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'category_id', 'id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function scopeIsActive($query)
    {
        return $query->where('is_active', CategoryStatus::ACTIVE);
    }
}
