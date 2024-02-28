<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modetype extends Model
{
    use HasFactory;
    protected $guarded = ['mt_id'];
    public function purchaseRequisition(){
        return $this->hasMany(Purchaserequisition::class);
    }
}
