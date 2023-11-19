<?php

namespace Modules\Course\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\CCategory\src\Models\CCategory;

class CategoryCourse extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories_courses';

    protected $fillable = [
        'category_id',
        'course_id',
    ];
}
