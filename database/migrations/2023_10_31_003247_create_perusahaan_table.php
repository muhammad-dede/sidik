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
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_perusahaan')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('no_telp')->nullable();
            $table->char('id_jenis_kelamin', 1)->nullable()->index();
            $table->integer('usia')->nullable();
            $table->char('id_pendidikan', 3)->nullable()->index();
            $table->unsignedBigInteger('id_jabatan')->nullable()->index();
            $table->text('alamat')->nullable();
            $table->char('id_kelurahan', 11)->nullable()->index();
            $table->char('id_kecamatan', 11)->nullable()->index();
            $table->char('id_kab_kota', 11)->nullable()->index();
            $table->char('id_provinsi', 11)->nullable()->index();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedBigInteger('id_badan_usaha')->nullable()->index();
            $table->integer('tahun_izin')->nullable();
            $table->timestamps();

            $table->foreign('id_jenis_kelamin')->references('id')->on('jenis_kelamin')->onDelete('set null');
            $table->foreign('id_pendidikan')->references('id')->on('pendidikan')->onDelete('set null');
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('set null');
            $table->foreign('id_kelurahan')->references('id')->on('kelurahan')->onDelete('set null');
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onDelete('set null');
            $table->foreign('id_kab_kota')->references('id')->on('kab_kota')->onDelete('set null');
            $table->foreign('id_provinsi')->references('id')->on('provinsi')->onDelete('set null');
            $table->foreign('id_badan_usaha')->references('id')->on('badan_usaha')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
