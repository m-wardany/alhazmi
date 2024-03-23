<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_name',
        'en_name',
        'location',
        'ar_address',
        'en_address',
        'phone_numbers',
        'mobile_numbers',
    ];
}
