<?php

namespace App\Http\Requests\BadanUsaha;

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
            'nama' => ['required', 'string', 'max:255', 'unique:badan_usaha,nama'],
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
        ];
    }
}
