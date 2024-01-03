<?php

namespace App\Http\Requests\IKM;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id_produk' => ['required', 'string', 'max:20'],
            'id_perusahaan' => ['required', 'string', 'max:36'],
            'kbli_pirt' => ['required', 'string', 'max:255'],
            'harga_jual' => ['required', 'numeric'],
            'tenaga_kerja' => ['required', 'numeric'],
            'nilai_investasi' => ['required', 'numeric'],
            'jumlah_produksi' => ['required', 'numeric'],
            'id_satuan_produksi' => ['required', 'string', 'max:20'],
            'nilai_produksi' => ['required', 'numeric'],
            'nilai_bb_bp' => ['required', 'numeric'],
            'export' => ['nullable', 'numeric'],
            'keterangan' => ['nullable', 'string'],
            'image_primary' => ['nullable', 'mimes:png,jpg', 'max:2048'],
            'image_secondary' => ['nullable', 'mimes:png,jpg', 'max:2048'],
        ];
    }

    public function attributes()
    {
        return [
            'id_produk' => 'Produk',
            'id_perusahaan' => 'Perusahaan',
            'kbli_pirt' => "KBLI/PIRT",
            'harga_jual' => 'Harga Jual',
            'tenaga_kerja' => 'Tenaga Kerja',
            'nilai_investasi' => 'Nilai Investasi',
            'jumlah_produksi' => 'Jumlah Produksi',
            'id_satuan_produksi' => 'Satuan Produksi',
            'nilai_produksi' => 'Nilai Produksi',
            'nilai_bb_bp' => 'Nilai BB/BP',
            'export' => 'Export',
            'keterangan' => 'Keterangan',
            'image_primary' => 'Foto 1',
            'image_secondary' => 'Foto 2',
        ];
    }
}
