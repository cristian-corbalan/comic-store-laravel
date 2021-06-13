<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:100',
            'password' => 'required|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'No ingresaste un email valido',
            'email.max' => 'El email no puede superar los 100 caracteres',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe contener 8 caracteres como mínimo',
        ];
    }
}
