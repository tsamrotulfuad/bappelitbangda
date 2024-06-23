<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokinUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'file_pokin',
    ];
}
