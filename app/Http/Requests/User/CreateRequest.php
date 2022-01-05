<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && Auth::user()->isAdmin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'bail|required|string|min:3|max:40',
            'email'   => 'bail|required|string|email|max:100|unique:users',
            'isAdmin' => 'bail|required'
        ];
    }

    public function messages()
    {
        return [
            'name.min'         => 'O nome deve ter no mínimo :min caracteres.',
            'required'         => 'Campo obrigatório',
            'name.max'         => 'O nome deve ter no máximo :max caracteres.',
            'email.email'      => 'Informe um e-mail válido.',
            'email.max'        => 'Informe um e-mail com no máximo :max caracteres.',
            'email.unique'     => 'E-mail já cadastrado.',

        ];
    }
    public function attributes()
    {
        return [
            'isAdmin' => 'administrador'
        ];
    }
}
