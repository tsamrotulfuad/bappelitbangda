<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TujuanIndikator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'satuan',
        'awal_kinerja',
        'target_kinerja',
        'n',
        'n_1',
        'n_2',
        'n_3',
        'n_4',
        'tujuan_id'
    ];
    
    public function tujuan(): BelongsTo
    {
        return $this->belongsTo(Tujuan::class);
    }

    public function program() : BelongsToMany
    {
        return $this->belongsToMany(Program::class);
    }
}
