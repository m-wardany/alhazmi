<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory, \App\Traits\UpdateCache;

    protected $fillable = [
        'ar_name',
        'en_name',
        'url',
        'image'
    ];

    function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
