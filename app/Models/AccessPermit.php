<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessPermit extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id','login_id','access','password','report_access','back_date_entry','post_date_entry','branch_id','company_id','role_id','module_id','page_id',
    ];
}
