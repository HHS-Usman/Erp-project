<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_sub_category extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $attributes = [
        'product1stsbctgry_code'=>'',
        'detail'=>'',
    ];
}
