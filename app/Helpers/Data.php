<?php

use App\Models\BadanUsaha;
use App\Models\Jabatan;
use App\Models\JenisKelamin;
use App\Models\KabKota;
use App\Models\KategoriProduk;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pendidikan;
use App\Models\Pengaturan;
use App\Models\Produk;
use App\Models\Provinsi;
use App\Models\SatuanProduksi;
use Spatie\Permission\Models\Role;

function pengaturan()
{
    $data = Pengaturan::where('id', 1)->first();
    return $data;
}

function role()
{
    $data = Role::all();
    return $data;
}

function jenisKelamin()
{
    $data = JenisKelamin::all();
    return $data;
}

function pendidikan()
{
    $data = Pendidikan::orderByRaw('CONVERT(id, SIGNED) asc')->get();
    return $data;
}

function provinsi()
{
    $data = Provinsi::orderBy('nama', 'asc')->get();
    return $data;
}

function kabKota($id_provinsi = '')
{
    $data = KabKota::where('id_provinsi', $id_provinsi)->orderBy('nama', 'asc')->get();
    return $data;
}

function kecamatan($id_kab_kota = '')
{
    $data = Kecamatan::where('id_kab_kota', $id_kab_kota)->orderBy('nama', 'asc')->get();
    return $data;
}

function kelurahan($id_kecamatan = '')
{
    $data = Kelurahan::where('id_kecamatan', $id_kecamatan)->orderBy('nama', 'asc')->get();
    return $data;
}

function jabatan()
{
    $data = Jabatan::orderBy('nama', 'asc')->get();
    return $data;
}

function badanUsaha()
{
    $data = BadanUsaha::orderBy('nama', 'asc')->get();
    return $data;
}

function satuanProduksi()
{
    $data = SatuanProduksi::orderBy('nama', 'asc')->get();
    return $data;
}

function kategoriProduk()
{
    $data = KategoriProduk::orderBy('nama', 'asc')->get();
    return $data;
}

function produk()
{
    $data = Produk::orderBy('nama', 'asc')->get();
    return $data;
}
