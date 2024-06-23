<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('indikator_utama');
            $table->foreign('indikator_utama')->references('id')->on('tujuan_indikators');
            $table->string('indikator_program');
            $table->string('satuan');
            $table->string('perangkat_daerah');
            $table->string('kinerja_awal');
            $table->string('kinerja_akhir');
            $table->string('kinerja_akhir_satuan');
            $table->string('target_n');
            $table->string('target_n_1');
            $table->string('target_n_2');
            $table->string('target_n_3');
            $table->string('target_n_4');
            $table->string('target_n_5');
            $table->string('satuan_n');
            $table->string('satuan_n_1');
            $table->string('satuan_n_2');
            $table->string('satuan_n_3');
            $table->string('satuan_n_4');
            $table->string('satuan_n_5');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
