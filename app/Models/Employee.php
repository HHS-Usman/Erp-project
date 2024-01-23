<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function payroll()
    {
        return $this->hasOne(Emp_Payroll::class);
    }

    public function companyInfo()
    {
        return $this->hasOne(Emp_Company_Info::class);
    }

    public function document()
    {
        return $this->hasOne(Emp_document::class);
    }
    public function purchaserequisition()
    {
        return $this->hasMany(Purchaserequisition::class,'purchase_id');
    }
}
