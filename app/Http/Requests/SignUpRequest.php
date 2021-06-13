<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'name' => 'required|min:3|max:45',
            'last_name' => 'required|min:3|max:45',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe contener 3 caracteres como mínimo',
            'name.max' => 'El nombre puede contener 45 caracteres como maximo',
            'last_name.required' => 'El apellido es obligatorio',
            'last_name.min' => 'El apellido debe contener 3 caracteres como mínimo',
            'last_name.max' => 'El apellido puede contener 45 caracteres como maximo',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.unique' => 'El correo electrónico ya esta en uso',
            'email.email' => 'No ingresaste un email valido',
            'email.max' => 'El email no puede superar los 100 caracteres',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe contener 8 caracteres como mínimo',
            'password.confirmed' => 'Las contraseñas ingresadas no son iguales',
            'password_confirmation.required' => 'La confirmación de la contraseña es obligatoria',
            'password_confirmation.min' => 'La confirmación de la contraseña debe contener 8 caracteres como mínimo',
        ];
    }
}
