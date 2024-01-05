<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_supplier extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $attributes = [
        'product_supplier_code' => '',
        'detail' => '',
    ];
}
