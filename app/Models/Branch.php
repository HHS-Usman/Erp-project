<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function purchaserequisition()
    {
        return $this->hasMany(Purchaserequisition::class);     
    }
    public function vouchertypes()
    {
        return $this->hasMany(Vouchertype::class, 'branch_id');     
    }
    public function jvoucher(){
        return $this->hasMany(Journalvoucher::class,'voucher_id');
    }
    public function evoucher(){
        return $this->hasMany(Voucherentires::class,'ventry_id');
    }
    public function quotationdata()
    {
        return $this->hasMany(Quotation::class);
    }
    public function prdetail()
    {
        return $this->hasMany(Pr_detail::class);
    }
}
