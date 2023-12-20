<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function permissions()
    {
        return $this->hasMany(Permissions::class);
    }
}
