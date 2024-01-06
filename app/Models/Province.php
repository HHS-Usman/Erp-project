<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    protected $attributes = [
        'province_code' => '',
        'detail' => '',
    ];
    public function supplier()
    {
        return $this->hasMany(Supplier::class, 'suplier_id');
    }
    public function coas()
    {
        return $this->hasMany(Coa::class, 'id');
    }
    public function buyer()
    {
        return $this->hasMany(buyer::class, 'buyer_id');
    }
}
