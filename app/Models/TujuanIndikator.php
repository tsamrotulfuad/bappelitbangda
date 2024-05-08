<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TujuanIndikator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tujuan_id'
    ];

    public function tujuan(): BelongsTo
    {
        return $this->belongsTo(Tujuan::class);
    }
}
