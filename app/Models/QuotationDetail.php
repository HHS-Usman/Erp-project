<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationDetail extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    // Relation between two table created by Muhammad Badar
    public function quotation()
    {
        return $this->belongsTo(Quotation::class , 'quo_id');
    }
    public function documentstatus()
    {
        return $this->belongsTo(Documentstatus::class, 'doc_status');
    }
}
