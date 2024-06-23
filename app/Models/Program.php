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
        'indikator_utama',
        'indikator_program',
        'satuan',
        'perangkat_daerah',
        'kinerja_awal',
        'kinerja_akhir',
        'kinerja_akhir_satuan',
        'target_n',
        'target_n_1',
        'target_n_2',
        'target_n_3',
        'target_n_4',
        'target_n_5',
        'satuan_n',
        'satuan_n_1',
        'satuan_n_2',
        'satuan_n_3',
        'satuan_n_4',
        'satuan_n_5'
    ];

    public function tujuan_indikator() : BelongsTo
    {
        return $this->belongsTo(TujuanIndikator::class, 'indikator_utama', 'id');
    }

}
