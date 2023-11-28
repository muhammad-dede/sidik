<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanProduksi extends Model
{
    use HasFactory;

    protected $table = 'satuan_produksi';
    public $timestamps = false;

    protected $guarded = [];
}
