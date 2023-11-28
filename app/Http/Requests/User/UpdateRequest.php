<?php

namespace App\Http\Requests\User;

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
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:user,username,' . $this->user->id . ',id'],
            'role' => ['required', 'string'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
            'username' => 'Username',
            'role' => 'Role',
            'password' => 'Password',
            'password_confirmation' => 'Konfirmasi Password',
        ];
    }
}
