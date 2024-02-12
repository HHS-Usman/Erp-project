<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageAction extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function permissions()
    {
        return $this->hasMany(Permissions::class);
    }
   
    public function editdata(){
        
    }
    public function deletedata(){
        
    }
}
