<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produk\StoreRequest;
use App\Http\Requests\Produk\UpdateRequest;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:index-produk')->only('index');
        $this->middleware('permission:create-produk')->only(['create', 'store']);
        $this->middleware('permission:edit-produk')->only(['edit', 'update']);
        $this->middleware('permission:destroy-produk')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Produk::orderBy('nama', 'asc');
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->where('nama', 'like', "%" . request('search') . "%")->orWhereHas('kategoriProduk', function ($query) {
                                $query->where('nama', 'like', "%" . request('search') . "%");
                            });
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('kategori', function ($data) {
                    return $data->kategoriProduk->nama;
                })
                ->addColumn('action', function ($data) {
                    return '<a href="' . route('produk.edit', $data->id) . '" class="btn-sm btn-success">Edit</a>&nbsp;<a href="' . route('produk.destroy', $data->id) . '" class="btn-sm btn-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['kategori', 'action'])
                ->make(true);
        }
        return view('produk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori_produk = KategoriProduk::orderBy('nama', 'asc')->get();

        return view('produk.create', compact('kategori_produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Produk::create([
            'nama' => ucfirst($request->nama),
            'slug' => Str::of($request->nama)->slug('-'),
            'id_kategori_produk' => $request->id_kategori_produk,
        ]);

        return redirect()->route('produk.index')->with('success', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $kategori_produk = KategoriProduk::orderBy('nama', 'asc')->get();

        return view('produk.edit', compact('kategori_produk', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Produk $produk)
    {
        $produk->update([
            'nama' => ucfirst($request->nama),
            'slug' => Str::of($request->nama)->slug('-'),
            'id_kategori_produk' => $request->id_kategori_produk,
        ]);

        return redirect()->route('produk.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Produk $produk)
    {
        if ($request->ajax()) {
            $produk->delete();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
