<?php

namespace App\Http\Controllers;

use App\Models\Ikm;
use App\Models\KategoriProduk;
use App\Models\Kecamatan;
use App\Models\Perusahaan;
use App\Models\Produk;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $kategori_produk = KategoriProduk::all();
        $lokasi = Kecamatan::where('id_kab_kota', pengaturan()->id_kab_kota)->get();
        $ikm = Ikm::orderBy('created_at', 'desc')->limit(6)->get();
        $jumlah_kategori = KategoriProduk::count();
        $jumlah_perusahaan = Perusahaan::count();
        $jumlah_produk = Produk::count();
        $jumlah_ikm = Ikm::count();

        return view(
            'web.index',
            [
                'kategori_produk' => $kategori_produk,
                'lokasi' => $lokasi,
                'ikm' => $ikm,
                'jumlah_kategori' => $jumlah_kategori,
                'jumlah_perusahaan' => $jumlah_perusahaan,
                'jumlah_produk' => $jumlah_produk,
                'jumlah_ikm' => $jumlah_ikm,
            ]
        );
    }

    public function produkIkm(Request $request)
    {
        $kategori_produk = KategoriProduk::all();

        if ($request->kategori) {
            $ikm = Ikm::whereHas('produk', function ($query) use ($request) {
                $query->whereHas('kategoriProduk', function ($query) use ($request) {
                    $query->where('slug', $request->kategori);
                });
            })->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $ikm = Ikm::orderBy('created_at', 'desc')->paginate(5);
        }

        return view('web.produk-ikm', [
            'kategori_produk' => $kategori_produk,
            'ikm' => $ikm,
        ]);
    }

    public function produkIkmDetail($id)
    {
        $ikm = Ikm::findOrFail($id);
        $data_ikm = Ikm::orderBy('created_at', 'desc')->limit(5)->get();

        return view('web.produk-detail', ['ikm' => $ikm, 'data_ikm' => $data_ikm]);
    }

    public function kontak()
    {
        return view('web.kontak');
    }
}
