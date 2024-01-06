<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit_selection extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $attributes = [
        'uom_code' => '',
        'detail' => '', // or any default value you prefer
    ];

}
