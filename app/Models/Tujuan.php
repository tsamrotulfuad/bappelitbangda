<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tujuan extends Model
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

    public function tujuan_indikator(): HasMany
    {
        return $this->hasMany(TujuanIndikator::class);
    }
}
