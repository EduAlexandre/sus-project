<?php

namespace App\Http\Requests\Employee;

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
            'name'          => 'bail|required|string|min:5|max:150',
            'mother'        => 'bail|required|string|min:5|max:150',
            'cpf'           => 'bail|required|string|max:14|unique:employees,cpf,' . $this->employee->id,
            'rg'            => 'bail|required|string|max:30|unique:employees,rg,' . $this->employee->id,
            'sus_card'      => 'bail|required|string|max:50|unique:employees,sus_card,' . $this->employee->id,
            'isAlive'       => 'bail|required',
            'deathCause'    => 'bail|max:350',
            'address'       => 'bail|required|string|max:80',
            'district'      => 'bail|required|max:80',
            'city'          => 'bail|required|string|max:40',
            'state'         => 'bail|required|string|max:2',
        ];
    }

    public function messages()
    {
        return [
            'required'         => 'Campo obrigatório.',
            'name.min'         => 'O nome deve ter no mínimo :min caracteres.',
            'name.max'         => 'O nome deve ter no máximo :max caracteres.',
            'cpf.max'          => 'CPF deve ter no máximo :max caracteres.',
            'cpf.unique'       => 'CPF já cadastrado.',
            'rg.max'           => 'RG deve ter no máximo :max caracteres.',
            'rg.unique'        => 'RG já cadastrado.',
            'sus_card.max'     => 'Número do SUS deve ter no máximo :max caracteres.',
            'sus_card.unique'  => 'Número do SUS já cadastrado',
            'deathCause'       => 'Deve ter no máximo de :max caracteres.',
            'address.max'      => 'Endereço deve ter no máximo de :max caracteres.',
            'district.max'     => 'Bairro deve ter no máximo de :max caracteres.',
            'state.max'        => 'Estado deve ter no máximo de :max caracteres.',
        ];
    }
}
