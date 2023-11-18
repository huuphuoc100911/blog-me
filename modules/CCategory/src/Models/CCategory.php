<?php

namespace Modules\CCategory\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function children()
    {
        return $this->hasMany(CCategory::class, 'parent_id', 'id');
    }

    public function subCategories()
    {
        return $this->children()->with('subCategories');
    }
}
