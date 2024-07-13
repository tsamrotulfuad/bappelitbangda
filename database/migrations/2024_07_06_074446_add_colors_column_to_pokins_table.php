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
        Schema::table('pokins', function (Blueprint $table) {
            $table->string('color')->after('tema')->nullable();
            $table->string('color_indikator')->after('color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pokins', function (Blueprint $table) {
            //
        });
    }
};
