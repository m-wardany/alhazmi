<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory, \App\Traits\UpdateCache, \App\Traits\Sortable;

    protected $fillable = [
        'image',
        'sort'
    ];

    function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
