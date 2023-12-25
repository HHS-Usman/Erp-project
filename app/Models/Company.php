<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function jvoucher(){
        return $this->hasMany(Journalvoucher::class,'voucher_id');
    }
    public function evoucher(){
        return $this->hasMany(Voucherentires::class,'ventry_id');
    }
}
