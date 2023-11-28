<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikm extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'ikm';

    public function getKey()
    {
        return $this->id;
    }

    protected $guarded = [];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

    public function satuanProduksi()
    {
        return $this->belongsTo(SatuanProduksi::class, 'id_satuan_produksi', 'id');
    }
}
