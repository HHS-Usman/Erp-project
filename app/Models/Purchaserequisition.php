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
    public function department()
    {
        return $this->belongsTo(Department::class,'depart_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
    public function Pr_detail()
    {
        return $this->hasMany(Pr_detail::class);
    }
}
