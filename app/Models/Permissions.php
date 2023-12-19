<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Permissions extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
    public function pageaction()
    {
        return $this->belongsTo(PageAction::cl.ass, 'page_action_id');
    }
}
