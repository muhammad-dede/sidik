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
        Schema::create('kab_kota', function (Blueprint $table) {
            $table->char('id', 11)->primary();
            $table->string('nama')->nullable();
            $table->char('id_provinsi', 11)->nullable()->index();

            $table->foreign('id_provinsi')->references('id')->on('provinsi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kab_kota');
    }
};
