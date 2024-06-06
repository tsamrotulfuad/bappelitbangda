<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Urusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    public function tujuan_indikator(): BelongsTo
    {
        return $this->belongsTo(TujuanIndikator::class);
    }
}
