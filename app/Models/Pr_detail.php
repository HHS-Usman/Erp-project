<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pr_detail extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    //
    public function productcategory()
    {
        return $this->belongsTo(Product_category::class, 'pc_id');
    }

    public function productsubcategory()
    {
        return $this->belongsTo(Product_sub_category::class, 'psubc_id');
    }

    public function brandselection()
    {
        return $this->belongsTo(Brand_Selection::class, 'bs_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'p_id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function purchaserequisition()
    {
        return $this->belongsTo(Branch::class, 'pre_id');
    }
}

