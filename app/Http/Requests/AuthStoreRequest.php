<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => "O nome precisa ser maior.",
            'email.unique' => "Este e-mail já está cadastrado.",
            'email' => "E-mail inválido.",
            'password.min' => "A senha precisa ser maior que 6 caracteres.",
        ];
    }
}
