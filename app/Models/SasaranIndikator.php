<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SasaranIndikator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'sasaran_id'
    ];

    public function sasaran(): BelongsTo
    {
        return $this->belongsTo(Sasaran::class);
    }
}
