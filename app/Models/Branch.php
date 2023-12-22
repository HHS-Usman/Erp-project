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

    public function vouchertypes()
    {
        return $this->hasMany(Vouchertype::class, 'branch_id');
    }
}
