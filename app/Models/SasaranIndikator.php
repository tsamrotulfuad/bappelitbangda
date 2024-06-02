<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function program(): HasMany
    {
        return $this->hasMany(Program::class);
    }
}
