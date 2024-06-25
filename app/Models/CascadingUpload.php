<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CascadingUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'file_cascading',
        'tahun'
    ];
}
