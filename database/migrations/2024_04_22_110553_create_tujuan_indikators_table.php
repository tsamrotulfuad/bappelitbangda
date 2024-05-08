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
