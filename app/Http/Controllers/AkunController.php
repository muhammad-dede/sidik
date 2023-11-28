<?php

namespace App\Http\Controllers;

use App\Http\Requests\Akun\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function edit()
    {
        return view('akun.edit');
    }

    public function update(UpdateRequest $request)
    {
        $user = User::findOrFail(auth()->id());

        if ($request->password) {
            if (!Hash::check($request->password_old, $user->password)) {
                return back()->withErrors([
                    'password_old' => __('Password lama salah'),
                ])->withInput();
            }
        }

        $user->update([
            'nama' => ucfirst($request->nama),
            'username' => strtolower($request->username),
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->back()->with('success', 'Berhasil disimpan!');
    }
}
