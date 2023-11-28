<?php

namespace App\Http\Requests\Pengaturan;

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
            'id_provinsi' => ['required', 'string', 'max:11'],
            'id_kab_kota' => ['required', 'string', 'max:11'],
            'latitude' => ['required', 'string', 'max:255'],
            'longitude' => ['required', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'id_provinsi' => 'Provinsi',
            'id_kab_kota' => 'Kabupaten/Kota',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }
}
