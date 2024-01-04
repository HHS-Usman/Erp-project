<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    
    public function coas()
    {
        return $this->hasMany(Coa::class, 'id');
    }
    public function buyer()
    {
        return $this->hasMany(buyer::class, 'buyer_id');
    }
}
