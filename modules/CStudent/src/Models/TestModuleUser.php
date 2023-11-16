<?php

namespace Modules\CStudent\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModuleUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}
