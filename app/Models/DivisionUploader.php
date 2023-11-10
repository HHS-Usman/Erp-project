<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionUploader extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'mime_type', 'file_contents'];
}
