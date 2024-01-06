<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliertype extends Model
{
    use HasFactory;
    protected $guarded = [
        'stype_id',
    ];
    protected $attributes = [
        'suppliertype_code' => '',
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
    protected $primaryKey = 'stype_id';
}
