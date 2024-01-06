<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyertype extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey = 'btype_id';
}
