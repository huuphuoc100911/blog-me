<?php

namespace App\Models;

use App\Enums\AccountStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'customers';

    protected $guarded = 'customer';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone_number',
        'city',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('is_active', AccountStatus::ACTIVE);
    }
}
