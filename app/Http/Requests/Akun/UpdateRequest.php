<?php

namespace App\Http\Requests\Akun;

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
        // $rules['nama'] = 'required|string|max:255';
        // $rules['username'] = 'required|string|max:255|unique:user,username,' . auth()->id() . ',id';

        // if ($this->password) {
        //     $rules['password_old'] = 'required|string|min:8';
        //     $rules['password'] = 'required|string|min:8|confirmed';
        // }

        // return $rules;

        return [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username,' . auth()->id() . ',id',
            'password_old' => ['nullable', 'required_with:password', 'min:8', 'string'],
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
            'username' => 'Username',
            'password_old' => 'Password Lama',
            'password' => 'Password Baru',
            'password_confirmation' => 'Konfirmasi Password Baru',
        ];
    }
}
