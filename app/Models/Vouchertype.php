<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vouchertype extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function coadata()
    {
        return $this->belongsTo(Coa::class,'coa_id');
    }

    public function branchdata()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }
    public function jvoucher(){
        return $this->hasMany(Journalvoucher::class,'voucher_id');
    }
}
