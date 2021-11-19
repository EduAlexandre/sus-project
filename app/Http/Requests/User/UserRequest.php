<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:5|max:40',
            'email' => 'required|string|email|max:100|unique:users',
            'graduate' => 'required|string|max:10',
            'register' => 'required|numeric|unique:users',
            'password' => 'required|max:60',
        ];
    }

    public function messages()
    {
        return [
           'name.required'=> 'Informe seu nome de guerra.',
           'name.min'=> 'Nome de guerra tem que ter no mínimo :min.',
           'name.max'=> 'Nome de guerra tem que ter no máximo :max.',
           'email.required'=> 'Informe um e-mail.',
           'email.email'=> 'Informe um e-mail válido.',
           'email.max'=> 'Informe um e-mail com no máximo :max caracteres.',
           'email.unique'=> 'E-mail já cadastrado.',
           'graduate.required' => 'Infome a graduação.',
           'graduate.max' => 'A graduação deve conter no máximo :max.',
           'register.required' => 'Infome a matrícula.',
           'register.numeric' => 'Na matrícula, informe só os números.',
           'register.unique' => 'A matrícula cadastrada.',
           'password.required' => 'Senha Obrigatória.',
           'password.max' => 'A senha deve conter no máximo :max.',
        ];
    }
}
