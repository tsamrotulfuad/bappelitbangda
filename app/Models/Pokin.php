<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'indikator',
        'parentId',
        'user_id',
        'tema'
    ];
}
