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
}
