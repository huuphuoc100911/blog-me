<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class InfoCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
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

    public function company()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
