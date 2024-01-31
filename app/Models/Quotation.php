<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function supplierdata()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function branchdata()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'depart_id');
    }
    public function quotation_detail()
    {
        return $this->hasMany(quotation_detail::class, 'id');
    }
}
