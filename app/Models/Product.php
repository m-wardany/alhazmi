<?php

namespace App\Models;

use App\Traits\HasLocale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasLocale, \App\Traits\UpdateCache, \App\Traits\Sortable;

    protected $fillable = [
        'ar_name',
        'en_name',
        'image',
        'sort'
    ];

    function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
