<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
     ];
     public function costcenter()
     {
         return $this->hasMany(Costcenteraccount::class,'id');
     }
     public function purchaserequisition()
     {
         return $this->hasMany(Purchaserequisition::class,'purchase_id');
     }
}
