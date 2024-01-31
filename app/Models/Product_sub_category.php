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
    
    public function productcategory(){
        return $this->hasOne(Product_category::class);
    }
    public function brandselection(){
        return $this->hasMany(Brand_Selection::class);
    }
    public function prdetail()
    {
        return $this->hasMany(Pr_detail::class);
    }
}
