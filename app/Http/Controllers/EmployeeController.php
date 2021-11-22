<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function show()
    {
        return view('employee.employee');
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:5|max:150',
            'mother_name' => 'required|string|min:5|max:150',
            'cpf' => 'required|numeric|max:14|unique:employees',
            'is_alive' => 'required|max:3',
            'death_cause' => 'max:350',
            'address' => 'required|string|max:80',
            'district' => 'required|max:80',
            'city' => 'required|string|max:40',
            'state' => 'required|string|max:2',
        ];

        $feedBack = [
            'required'=> 'Campo obrigatório.',
            'name.min'=> 'O nome deve ter no mínimo :min caracteres.',
            'name.max'=> 'O nome deve ter no máximo :max caracteres.',
            'cpf.max'=> 'CPF deve ter no máximo :max caracteres.',
            'death_cause'=> 'Deve ter no máximo de :max caracteres.',
            'address.max'=> 'Endereço deve ter no máximo de :max caracteres.',
            'district.max'=> 'Bairro deve ter no máximo de :max caracteres.',
            'state.max'=> 'Estado deve ter no máximo de :max caracteres.',

        ];

        $request->validate($rules, $feedBack);


        Employee::create([
            'name' => $request->name,
            'mother_name' => $request->mother,
            'cpf' => $request->cpf,
            'is_alive' => $request->isAlive,
            'death_cause' => $request->deathCause,
            'address' => $request->address,
            'district' => $request->district,
            'city' => $request->city,
            'state' => $request->state,
        ]);


        Alert::success('Sucesso', 'Usuário cadastrado com sucesso');
        return redirect('/employee');
    }
}
