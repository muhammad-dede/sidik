<?php

namespace App\Http\Requests\Perusahaan;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_perusahaan' => ['required', 'string', 'max:255', 'unique:perusahaan,nama_perusahaan'],
            'nama_pemilik' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string', 'max:255'],
            'id_jenis_kelamin' => ['required', 'string', 'max:1'],
            'usia' => ['required', 'numeric'],
            'id_pendidikan' => ['required', 'string', 'max:3'],
            'id_jabatan' => ['required', 'string', 'max:20'],
            'latitude' => ['required', 'string', 'max:255'],
            'longitude' => ['required', 'string', 'max:255'],
            'id_provinsi' => ['required', 'string', 'max:11'],
            'id_kab_kota' => ['required', 'string', 'max:11'],
            'id_kecamatan' => ['required', 'string', 'max:11'],
            'id_kelurahan' => ['required', 'string', 'max:11'],
            'alamat' => ['required', 'string'],
            'id_badan_usaha' => ['required', 'string', 'max:20'],
            'tahun_izin' => ['required', 'date_format:Y'],
        ];
    }

    public function attributes()
    {
        return [
            'nama_perusahaan' => 'Nama Perusahaan',
            'nama_pemilik' => 'Nama Pemilik',
            'no_telp' => 'Nomor Telepon',
            'id_jenis_kelamin' => 'Jenis Kelamin',
            'usia' => 'Usia',
            'id_pendidikan' => 'Pendidikan',
            'id_jabatan' => 'Jabatan',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'id_provinsi' => 'Provinsi',
            'id_kab_kota' => 'Kabupaten/Kota',
            'id_kecamatan' => 'Kecamatan',
            'id_kelurahan' => 'Kelurahan',
            'alamat' => 'Alamat',
            'id_badan_usaha' => 'Badan Usaha',
            'tahun_izin' => 'Tahun Izin',
        ];
    }
}
