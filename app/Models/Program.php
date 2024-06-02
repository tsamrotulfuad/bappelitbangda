<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'sasaran_indikator_id'
    ];

    public function indikator_sasaran(): BelongsTo
    {
        return $this->belongsTo(SasaranIndikator::class, 'sasaran_indikator_id', 'id');
    }

}
