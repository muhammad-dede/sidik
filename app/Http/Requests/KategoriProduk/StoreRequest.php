<?php

namespace App\Http\Requests\KategoriProduk;

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
            'nama' => ['required', 'string', 'max:255', 'unique:kategori_produk,nama'],
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
        ];
    }
}
