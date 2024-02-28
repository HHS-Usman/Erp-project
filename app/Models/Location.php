<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded = ['location_id'];

    public function purchaseRequisitions(){
        return $this->hasMany(PurchaseRequisition::class, 'req_by_location_id');
    }    
}
