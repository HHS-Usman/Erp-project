<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Type extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $attributes = [
        'product_type_code' => '',
        'detail' => '',
    ];
}
