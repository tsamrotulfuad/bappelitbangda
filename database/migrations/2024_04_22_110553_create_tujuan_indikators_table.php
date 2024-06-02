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
        Schema::create('tujuan_indikators', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('tujuan_id');
            $table->string('satuan');
            $table->string('kondisi_awal_kinerja');
            $table->string('target_kinerja_akhir_periode');
            $table->json('urusan');
            $table->json('perangkat_daerah');
            $table->foreign('tujuan_id')->references('id')->on('tujuans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tujuan_indikators');
    }
};
