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
    public function modeltype()
    {
        return $this->belongsTo(Modetype::class,'modet_id');
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
        return $this->hasMany(Pr_detail::class);
    }
}
