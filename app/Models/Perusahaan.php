<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'perusahaan';

    public function getKey()
    {
        return $this->id;
    }

    protected $guarded = [];

    public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class, 'id_jenis_kelamin', 'id');
    }

    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }

    public function kabKota()
    {
        return $this->belongsTo(KabKota::class, 'id_kab_kota', 'id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }

    public function badanUsaha()
    {
        return $this->belongsTo(BadanUsaha::class, 'id_badan_usaha', 'id');
    }

    public function ikm()
    {
        return $this->hasMany(Ikm::class, 'id_perusahaan', 'id');
    }
}
