<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brand_Selection extends Model
{
    use HasFactory;
    // I have used because it was giving me conflict between table which is not available 
    protected $table = 'brand_selections';
    protected $guarded = [
        'id'
    ];
    protected $attributes = [
        'brand_selection_code' => '',
        'detail' => '',
    ];
    public function pSubc(){
        return $this->belongsTo(Product_sub_category::class,'psubc_id');
    }
    public function prdetail()
    {
        return $this->hasMany(Pr_detail::class);
    }

}
