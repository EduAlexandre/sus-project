<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class createEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|string|min:5|max:150',
            'mother'  => 'required|string|min:5|max:150',
            'cpf'          => 'required|string|max:14|unique:employees',
            'rg'           => 'required|string|max:30|unique:employees',
            'sus_card'     => 'required|string|max:50|unique:employees',
            'isAlive'     => 'required',
            'deathCause'  => 'max:350',
            'address'      => 'required|string|max:80',
            'district'     => 'required|max:80',
            'city'         => 'required|string|max:40',
            'state'        => 'required|string|max:2',
        ];
    }

    public function messages()
    {
           return [
                'required'      => 'Campo obrigatório.',
                'name.min'      => 'O nome deve ter no mínimo :min caracteres.',
                'name.max'      => 'O nome deve ter no máximo :max caracteres.',
                'cpf.max'       => 'CPF deve ter no máximo :max caracteres.',
                'rg.max'        => 'RG deve ter no máximo :max caracteres.',
                'sus_card.max'  => 'Número do SUS deve ter no máximo :max caracteres.',
                'deathCause'   => 'Deve ter no máximo de :max caracteres.',
                'address.max'   => 'Endereço deve ter no máximo de :max caracteres.',
                'district.max'  => 'Bairro deve ter no máximo de :max caracteres.',
                'state.max'     => 'Estado deve ter no máximo de :max caracteres.',
            ];
    }
}
