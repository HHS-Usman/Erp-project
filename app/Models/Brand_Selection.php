<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand_Selection extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $attributes = [
        'brand_selection_code' => '',
        'detail' => '',
    ];

}
