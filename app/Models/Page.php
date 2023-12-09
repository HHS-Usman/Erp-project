<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function getPageTableName()
    {
        return $this->name;
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
