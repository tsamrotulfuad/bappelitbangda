<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Misi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'visi_id',
    ];

    public function visi(): BelongsTo
    {
        return $this->belongsTo(Visi::class);
    }

    public function tujuan(): HasMany
    {
        return $this->hasMany(Tujuan::class);
    }
}
