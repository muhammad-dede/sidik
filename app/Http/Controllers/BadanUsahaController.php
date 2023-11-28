<?php

namespace App\Http\Controllers;

use App\Http\Requests\BadanUsaha\StoreRequest;
use App\Http\Requests\BadanUsaha\UpdateRequest;
use App\Models\BadanUsaha;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BadanUsahaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:index-badan-usaha')->only('index');
        $this->middleware('permission:create-badan-usaha')->only(['create', 'store']);
        $this->middleware('permission:edit-badan-usaha')->only(['edit', 'update']);
        $this->middleware('permission:destroy-badan-usaha')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BadanUsaha::orderBy('nama', 'asc');
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
                    return '<a href="' . route('badan-usaha.edit', $data->id) . '" class="btn-sm btn-success">Edit</a>&nbsp;<a href="' . route('badan-usaha.destroy', $data->id) . '" class="btn-sm btn-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('badan-usaha.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('badan-usaha.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        BadanUsaha::create([
            'nama' => ucfirst($request->nama),
        ]);

        return redirect()->route('badan-usaha.index')->with('success', 'Berhasil ditambahkan');
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
    public function edit(BadanUsaha $badan_usaha)
    {
        return view('badan-usaha.edit', compact('badan_usaha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, BadanUsaha $badan_usaha)
    {
        $badan_usaha->update([
            'nama' => ucfirst($request->nama),
        ]);

        return redirect()->route('badan-usaha.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BadanUsaha $badan_usaha)
    {
        if ($request->ajax()) {
            $badan_usaha->delete();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
