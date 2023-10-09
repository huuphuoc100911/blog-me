<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $guarded = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function infoCompany()
    {
        return $this->hasOne(InfoCompany::class, 'admin_id', 'id');
    }

    public function getCreatedTimeAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d H:i');
    }
}
