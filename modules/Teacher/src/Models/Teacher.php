<?php

namespace Modules\Teacher\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Modules\Course\src\Models\Course;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'c_teachers';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'avatar',
        'exp',
    ];

    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? Storage::url($this->avatar) : '';
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
