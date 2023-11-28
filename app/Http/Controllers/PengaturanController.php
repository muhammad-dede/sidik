<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pengaturan\UpdateRequest;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function edit()
    {
        $pengaturan = Pengaturan::where('id', 1)->first();
        return view('pengaturan.edit', compact('pengaturan'));
    }

    public function update(UpdateRequest $request)
    {
        Pengaturan::updateOrCreate(['id' => 1], [
            'id_provinsi' => $request->id_provinsi,
            'id_kab_kota' => $request->id_kab_kota,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->back()->with('success', 'Berhasil disimpan');
    }
}
