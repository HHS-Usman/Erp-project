<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchaserequisition extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function modeltype()
    {
        return $this->hasOne(Modetype::class);
    }
    public function department()
    {
        return $this->hasOne(Department::class);
    }
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
    public function prdetail()
    {
        return $this->hasMany(Pr_detail::class);
    }
}
