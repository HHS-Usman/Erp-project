<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_Transaction extends Model
{
    use HasFactory;
    protected $guarded = [
        'a_transaction_id',
    ];
}
