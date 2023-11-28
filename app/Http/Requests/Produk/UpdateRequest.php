<?php

namespace App\Http\Requests\Produk;

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
            'nama' => ['required', 'string', 'max:255', 'unique:produk,nama,' . $this->produk->id . ',id'],
            'id_kategori_produk' => ['required', 'string', 'max:20'],
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
            'id_kategori_produk' => 'Kategori Produk',
        ];
    }
}
