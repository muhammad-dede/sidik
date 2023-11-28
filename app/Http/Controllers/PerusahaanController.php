<?php

namespace App\Http\Controllers;

use App\Http\Requests\Perusahaan\StoreRequest;
use App\Http\Requests\Perusahaan\UpdateRequest;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class PerusahaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:index-perusahaan')->only('index');
        $this->middleware('permission:create-perusahaan')->only(['create', 'store']);
        $this->middleware('permission:edit-perusahaan')->only(['edit', 'update']);
        $this->middleware('permission:show-perusahaan')->only(['show']);
        $this->middleware('permission:destroy-perusahaan')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Perusahaan::orderBy('nama_perusahaan', 'asc');
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->where('nama_perusahaan', 'like', "%" . request('search') . "%")->orWhere('nama_pemilik', 'like', "%" . request('search') . "%");
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('badan_usaha', function ($data) {
                    return $data->badanUsaha->nama;
                })
                ->addColumn('action', function ($data) {
                    return '<a href="' . route('perusahaan.edit', $data->id) . '" class="btn-sm btn-success">Edit</a>&nbsp;<a href="' . route('perusahaan.show', $data->id) . '" class="btn-sm btn-info">Detail</a>&nbsp;<a href="' . route('perusahaan.destroy', $data->id) . '" class="btn-sm btn-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['badan_usaha', 'action'])
                ->make(true);
        }
        return view('perusahaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $request_validated = $request->validated();
        $request_validated['nama_perusahaan'] = ucwords($request->nama_perusahaan ?? '');
        $request_validated['nama_pemilik'] = ucwords($request->nama_pemilik ?? '');
        $request_validated['alamat'] = ucfirst($request->alamat ?? '');

        Perusahaan::create($request_validated);

        return redirect()->route('perusahaan.index')->with('success', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Perusahaan $perusahaan)
    {
        return view('perusahaan.show', compact('perusahaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('perusahaan.edit', compact('perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Perusahaan $perusahaan)
    {
        $request_validated = $request->validated();
        $request_validated['nama_perusahaan'] = ucwords($request->nama_perusahaan ?? $perusahaan->nama_perusahaan);
        $request_validated['nama_pemilik'] = ucwords($request->nama_pemilik ?? $perusahaan->nama_pemilik);
        $request_validated['alamat'] = ucfirst($request->alamat ?? $perusahaan->alamat);

        $perusahaan->update($request_validated);

        return redirect()->route('perusahaan.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Perusahaan $perusahaan)
    {
        if ($request->ajax()) {
            $perusahaan->delete();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
