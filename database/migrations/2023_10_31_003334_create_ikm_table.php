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
        Schema::create('ikm', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_perusahaan')->nullable()->index();
            $table->string('kbli_pirt')->nullable()->unique();
            $table->unsignedBigInteger('id_produk')->nullable()->index();
            $table->double('harga_jual')->nullable();
            $table->integer('tenaga_kerja')->nullable();
            $table->double('nilai_investasi')->nullable();
            $table->double('jumlah_produksi')->nullable();
            $table->unsignedBigInteger('id_satuan_produksi')->nullable()->index();
            $table->double('nilai_produksi')->nullable();
            $table->double('nilai_bb_bp')->nullable();
            $table->double('export')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('image_primary')->nullable();
            $table->string('image_secondary')->nullable();
            $table->timestamps();

            $table->foreign('id_perusahaan')->references('id')->on('perusahaan')->onDelete('set null');
            $table->foreign('id_produk')->references('id')->on('produk')->onDelete('set null');
            $table->foreign('id_satuan_produksi')->references('id')->on('satuan_produksi')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikm');
    }
};
