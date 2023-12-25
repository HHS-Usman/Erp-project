<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journalvoucher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function vouchertype(){
        return $this->belongsTo(Vouchertype::class,'tvoucher_id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }
}
