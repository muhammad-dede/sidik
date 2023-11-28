<?php

namespace App\Http\Controllers;

use App\Http\Requests\Jabatan\StoreRequest;
use App\Http\Requests\Jabatan\UpdateRequest;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:index-jabatan')->only('index');
        $this->middleware('permission:create-jabatan')->only(['create', 'store']);
        $this->middleware('permission:edit-jabatan')->only(['edit', 'update']);
        $this->middleware('permission:destroy-jabatan')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Jabatan::orderBy('nama', 'asc');
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
                    return '<a href="' . route('jabatan.edit', $data->id) . '" class="btn-sm btn-success">Edit</a>&nbsp;<a href="' . route('jabatan.destroy', $data->id) . '" class="btn-sm btn-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('jabatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Jabatan::create([
            'nama' => ucfirst($request->nama),
        ]);

        return redirect()->route('jabatan.index')->with('success', 'Berhasil ditambahkan');
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
    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Jabatan $jabatan)
    {
        $jabatan->update([
            'nama' => ucfirst($request->nama),
        ]);

        return redirect()->route('jabatan.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Jabatan $jabatan)
    {
        if ($request->ajax()) {
            $jabatan->delete();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
