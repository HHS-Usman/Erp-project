<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role_access extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
    public function user_role()
    {
        return $this->belongsTo(User_role::class, 'role_id');
    }
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
