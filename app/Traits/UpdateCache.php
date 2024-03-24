<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait UpdateCache
{
    static function bootUpdateCache(): void
    {
        static::saved(function (Model $model) {
            cache()->forget('home_page');
        });
    }
}