<?php
// Pageable.php

namespace App\Traits;

use App\Models\Page;

trait Pageable
{
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function scopeActivePage($query)
    {
        return $query->whereHas('page', function ($query) {
            $query->active();
        });
    }
}
