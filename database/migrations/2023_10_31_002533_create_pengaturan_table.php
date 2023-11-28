<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->char('id_provinsi', 11)->nullable()->index();
            $table->char('id_kab_kota', 11)->nullable()->index();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->foreign('id_kab_kota')->references('id')->on('kab_kota')->onDelete('set null');
            $table->foreign('id_provinsi')->references('id')->on('provinsi')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaturan');
    }
};
