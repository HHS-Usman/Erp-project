<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
    public function buyercategory()
    {
        return $this->belongsTo(SupplierCategory::class, 'bcategory_id');
    }
    public function buyertype()
    {
        return $this->belongsTo(Suppliertype::class, 'btype_id');
    }
    public function Province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function City()
    {
        return $this->belongsTo(City::class, 'City_id');
    }
}
