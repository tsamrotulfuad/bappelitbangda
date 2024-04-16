<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sasaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'misi_id'
    ];

    public function misi(): BelongsTo
    {
        return $this->belongsTo(Misi::class);
    }
}
