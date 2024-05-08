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
        Schema::create('sasaran_indikators', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('sasaran_id');
            $table->foreign('sasaran_id')->references('id')->on('sasarans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sasaran_indikators');
    }
};
