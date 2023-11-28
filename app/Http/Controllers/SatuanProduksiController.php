<?php

namespace App\Http\Controllers;

use App\Http\Requests\SatuanProduksi\StoreRequest;
use App\Http\Requests\SatuanProduksi\UpdateRequest;
use App\Models\SatuanProduksi;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class SatuanProduksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:index-satuan-produksi')->only('index');
        $this->middleware('permission:create-satuan-produksi')->only(['create', 'store']);
        $this->middleware('permission:edit-satuan-produksi')->only(['edit', 'update']);
        $this->middleware('permission:destroy-satuan-produksi')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SatuanProduksi::orderBy('nama', 'asc');
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
                    return '<a href="' . route('satuan-produksi.edit', $data->id) . '" class="btn-sm btn-success">Edit</a>&nbsp;<a href="' . route('satuan-produksi.destroy', $data->id) . '" class="btn-sm btn-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('satuan-produksi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuan-produksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        SatuanProduksi::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('satuan-produksi.index')->with('success', 'Berhasil ditambahkan');
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
    public function edit(SatuanProduksi $satuan_produksi)
    {
        return view('satuan-produksi.edit', compact('satuan_produksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, SatuanProduksi $satuan_produksi)
    {
        $satuan_produksi->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('satuan-produksi.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SatuanProduksi $satuan_produksi)
    {
        if ($request->ajax()) {
            $satuan_produksi->delete();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
