<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'permissions',
    ];

    public function staff()
    {
        return $this->hasMany(Staff::class, 'role', 'id');
    }
}
