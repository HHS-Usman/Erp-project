<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentstatus extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function pr_detail()
    {
       return $this->hasmany(Pr_detail::class);
    }
    public function purchaserequisition()
    {
        return $this->hasMany(Purchaserequisition::class);
    }
    public function quotation()
    {
       return $this->hasmany(Quotation::class);
    }

}
