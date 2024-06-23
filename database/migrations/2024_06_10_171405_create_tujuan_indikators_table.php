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
            $table->string('satuan');
            $table->string('awal_kinerja');
            $table->string('target_kinerja');
            $table->string('n');
            $table->string('n_1');
            $table->string('n_2');
            $table->string('n_3');
            $table->string('n_4');
            $table->unsignedBigInteger('tujuan_id');
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
