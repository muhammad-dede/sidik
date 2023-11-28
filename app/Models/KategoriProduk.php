<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    use HasFactory;

    protected $table = 'kategori_produk';
    public $timestamps = false;

    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori_produk', 'id');
    }
}
