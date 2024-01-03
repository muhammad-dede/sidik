<?php

namespace App\Http\Controllers;

use App\Http\Requests\IKM\StoreRequest;
use App\Http\Requests\IKM\UpdateRequest;
use App\Models\Ikm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;

class IkmController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:index-ikm')->only('index');
        $this->middleware('permission:create-ikm')->only(['create', 'store']);
        $this->middleware('permission:edit-ikm')->only(['edit', 'update']);
        $this->middleware('permission:show-ikm')->only(['show']);
        $this->middleware('permission:destroy-ikm')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ikm::orderBy('created_at', 'desc');
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->whereHas('perusahaan', function ($query) {
                                $query->where('nama_perusahaan', 'like', "%" . request('search') . "%")->orWhere('nama_pemilik', 'like', "%" . request('search') . "%");
                            })->orWhereHas('produk', function ($query) {
                                $query->where('nama', 'like', "%" . request('search') . "%");
                            });
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('produk', function ($data) {
                    return $data->produk->nama;
                })
                ->addColumn('perusahaan', function ($data) {
                    return $data->perusahaan->nama_perusahaan;
                })
                ->addColumn('action', function ($data) {
                    return '<a href="' . route('ikm.edit', $data->id) . '" class="btn-sm btn-success">Edit</a>&nbsp;<a href="' . route('ikm.show', $data->id) . '" class="btn-sm btn-info">Detail</a>&nbsp;<a href="' . route('ikm.destroy', $data->id) . '" class="btn-sm btn-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['produk', 'perusahaan', 'action'])
                ->make(true);
        }

        return view('ikm.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ikm.create');
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

        $ikm = Ikm::create($request_validated);

        if ($request->hasFile('image_primary')) {

            if (!File::isDirectory(public_path('uploads'))) {
                File::makeDirectory(public_path('uploads'), 0777, true, true);
            }

            if (File::exists(public_path('uploads' . '/' . basename($ikm->image_primary)))) {
                File::delete(public_path('uploads' . '/' . basename($ikm->image_primary)));
            }

            $image_primary = Str::uuid() . '.' . $request->image_primary->extension();

            if ($request->image_primary->move(public_path('uploads'), $image_primary)) {
                $ikm->update([
                    'image_primary' => asset('') . 'uploads' . '/' . $image_primary,
                ]);
            };
        }

        if ($request->hasFile('image_secondary')) {

            if (!File::isDirectory(public_path('uploads'))) {
                File::makeDirectory(public_path('uploads'), 0777, true, true);
            }

            if (File::exists(public_path('uploads' . '/' . basename($ikm->image_secondary)))) {
                File::delete(public_path('uploads' . '/' . basename($ikm->image_secondary)));
            }

            $image_secondary = Str::uuid() . '.' . $request->image_secondary->extension();

            if ($request->image_secondary->move(public_path('uploads'), $image_secondary)) {
                $ikm->update([
                    'image_secondary' => asset('') . 'uploads' . '/' . $image_secondary,
                ]);
            };
        }

        return redirect()->route('ikm.index')->with('success', 'Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ikm $ikm)
    {
        return view('ikm.show', compact('ikm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ikm $ikm)
    {
        return view('ikm.edit', compact('ikm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Ikm $ikm)
    {
        $request_validated = $request->validated();

        $ikm->update($request_validated);

        if ($request->hasFile('image_primary')) {

            if (!File::isDirectory(public_path('uploads'))) {
                File::makeDirectory(public_path('uploads'), 0777, true, true);
            }

            if (File::exists(public_path('uploads' . '/' . basename($ikm->image_primary)))) {
                File::delete(public_path('uploads' . '/' . basename($ikm->image_primary)));
            }

            $image_primary = Str::uuid() . '.' . $request->image_primary->extension();

            if ($request->image_primary->move(public_path('uploads'), $image_primary)) {
                $ikm->update([
                    'image_primary' => asset('') . 'uploads' . '/' . $image_primary,
                ]);
            };
        }

        if ($request->hasFile('image_secondary')) {

            if (!File::isDirectory(public_path('uploads'))) {
                File::makeDirectory(public_path('uploads'), 0777, true, true);
            }

            if (File::exists(public_path('uploads' . '/' . basename($ikm->image_secondary)))) {
                File::delete(public_path('uploads' . '/' . basename($ikm->image_secondary)));
            }

            $image_secondary = Str::uuid() . '.' . $request->image_secondary->extension();

            if ($request->image_secondary->move(public_path('uploads'), $image_secondary)) {
                $ikm->update([
                    'image_secondary' => asset('') . 'uploads' . '/' . $image_secondary,
                ]);
            };
        }

        return redirect()->route('ikm.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ikm $ikm)
    {
        //
    }
}
