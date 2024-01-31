<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = [
        'suplier_id',
    ];
    public function Bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
    public function Suppliercategory()
    {
        return $this->belongsTo(SupplierCategory::class, 'suplierCatg_id');
    }
    public function Supliertype()
    {
        return $this->belongsTo(Suppliertype::class, 'stype_id');
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
    public function quotationdata()
    {
        return $this->hasMany(Quotation::class);
    }
    protected $primaryKey = 'suplier_id';

}
