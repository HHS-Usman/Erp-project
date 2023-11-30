<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saleperson extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    protected $fillable = [
        'saleperson_code',
        'persontype',
        'employee',
        'detail',
        'is_active',
    ];
}
