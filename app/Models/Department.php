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

     public function purchaserequisition()
     {
         return $this->hasMany(Purchaserequisition::class);
     }
     public function quotationdata()
     {
         return $this->hasMany(Quotation::class);
     }
}
