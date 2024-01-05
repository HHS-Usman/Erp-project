<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packing_Type extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $attributes = [
        'packing_type_code' => '',
        'detail' => '',
    ];
}
