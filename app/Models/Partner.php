<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory, \App\Traits\UpdateCache;

    const SLIDER_A = 0;
    const SLIDER_B = 1;

    protected $fillable = [
        'image',
        'sort',
        'slider'
    ];

    function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }

    function scopeSorted($query)
    {
        $query->orderBy('sort')->orderBy('id', 'desc');
    }
}
