<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 
        'title', 
        'url_image',
        'description',
        'priority',
        'is_active'
    ];
}
