<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InfoStaff extends Model
{
    use HasFactory;

    protected $table = 'info_staffs';

    protected $fillable = [
        'staff_id',
        'name',
        'url_image',
        'description',
        'email',
        'phone',
        'link_facebook',
    ];

    public function getImageUrlAttribute()
    {
        return $this->url_image ? Storage::url($this->url_image) : '';
    }

}
