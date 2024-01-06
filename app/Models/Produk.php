<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    public $timestamps = false;

    protected $guarded = [];

    public function kategoriProduk()
    {
        return $this->belongsTo(KategoriProduk::class, 'id_kategori_produk', 'id');
    }

    public function ikm()
    {
        return $this->hasMany(Ikm::class, 'id_produk', 'id');
    }
}
