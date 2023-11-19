<?php

namespace Modules\Course\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Modules\CCategory\src\Models\CCategory;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'c_courses';

    protected $fillable = [
        'name',
        'slug',
        'teacher_id',
        'description',
        'thumbnail',
        'price',
        'sale_price',
        'code',
        'duration',
        'is_document',
        'supports',
        'status'
    ];

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? Storage::url($this->thumbnail) : '';
    }

    public function categories()
    {
        return $this->belongsToMany(CCategory::class, 'categories_courses', 'course_id', 'category_id');
    }
}
