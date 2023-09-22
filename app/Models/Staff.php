<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'staffs';

    protected $guarded = 'staff';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function infoStaff()
    {
        return $this->hasOne(InfoStaff::class, 'staff_id', 'id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'staff_id', 'id');
    }

    public function category()
    {
        return $this->hasMany(Category::class, 'staff_id', 'id');
    }
}
