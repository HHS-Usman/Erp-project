<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp_document extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
