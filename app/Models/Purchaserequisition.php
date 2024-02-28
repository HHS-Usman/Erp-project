<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchaserequisition extends Model
{
    use HasFactory;
    protected $primaryKey = 'pr_id';
    protected $guarded = [
        'pr_id',
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'req_by_br_id');
    }
    public function location(){
        return $this->belongsTo(Location::class, 'req_by_location_id');
    }
    public function modeltype()
    {
        return $this->belongsTo(Modetype::class,'mode_type_id');
    }
    public function doc_status_value(){
        return $this->belongsTo(Documentstatus::class,'doc_status');
    }
    public function documentstatus()
    {
        return $this->belongsTo(Documentstatus::class,'doc_status');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'req_by_depart_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'req_by_emp_id');
    }
    public function Pr_detail()
    {
        return $this->hasMany(Pr_detail::class,'pr_id');
    }
}
