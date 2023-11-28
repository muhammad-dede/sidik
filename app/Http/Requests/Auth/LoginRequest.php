<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => ['required', 'string', 'exists:user,username'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'username.exists' => 'Username yang diberikan tidak cocok dengan data kami.'
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
