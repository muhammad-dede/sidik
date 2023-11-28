<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriProduk\StoreRequest;
use App\Http\Requests\KategoriProduk\UpdateRequest;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class KategoriProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:index-kategori-produk')->only('index');
        $this->middleware('permission:create-kategori-produk')->only(['create', 'store']);
        $this->middleware('permission:edit-kategori-produk')->only(['edit', 'update']);
        $this->middleware('permission:destroy-kategori-produk')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = KategoriProduk::orderBy('nama', 'asc');
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->where('nama', 'like', "%" . request('search') . "%");
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    return '<a href="' . route('kategori-produk.edit', $data->id) . '" class="btn-sm btn-success">Edit</a>&nbsp;<a href="' . route('kategori-produk.destroy', $data->id) . '" class="btn-sm btn-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('kategori-produk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori-produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        KategoriProduk::create([
            'nama' => ucfirst($request->nama),
            'slug' => Str::of($request->nama)->slug('-'),
        ]);

        return redirect()->route('kategori-produk.index')->with('success', 'Berhasil ditambahkan');
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
    public function edit(KategoriProduk $kategori_produk)
    {
        return view('kategori-produk.edit', compact('kategori_produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, KategoriProduk $kategori_produk)
    {
        $kategori_produk->update([
            'nama' => ucfirst($request->nama),
            'slug' => Str::of($request->nama)->slug('-'),
        ]);

        return redirect()->route('kategori-produk.index')->with('success', 'Berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, KategoriProduk $kategori_produk)
    {
        if ($request->ajax()) {
            $kategori_produk->delete();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
