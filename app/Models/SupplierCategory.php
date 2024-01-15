<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierCategory extends Model
{
    use HasFactory;
    protected $guarded = [
        'supliercatg_id',
    ];
    protected $attributes = [
        'suppliercategoty_Code' => '',
        'detail' => '',
    ];
    public function coas()
    {
        return $this->hasMany(Coa::class, 'id');
    }
    public function buyer()
    {
        return $this->hasMany(buyer::class, 'buyer_id');
    }
    protected $primaryKey = 'supliercatg_id';
}
