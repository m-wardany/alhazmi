<?php

namespace App\Traits;

use App\Models\Scopes\SortScope;

trait Sortable
{
    static function bootSortable(): void
    {
        static::addGlobalScope(new SortScope());

    }
}