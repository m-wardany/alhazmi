<?php

namespace App\Models;

use App\Traits\HasLocale;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Branch extends Model
{
    use HasFactory, HasLocale, \App\Traits\UpdateCache;

    protected $fillable = [
        'ar_name',
        'en_name',
        'location',
        'ar_address',
        'en_address',
        'phone_numbers',
        'mobile_numbers',
    ];

    function getInfoAttribute(): string
    {
        return implode('<br/>', [
            $this->name,
            $this->address,
            $this->phone_numbers,
            $this->mobile_numbers
        ]);
    }

    function getLatAttribute(): string
    {
        return data_get(explode(',', $this->location), 0);
    }

    function getLongAttribute(): string
    {
        return data_get(explode(',', $this->location), 1);
    }
}
