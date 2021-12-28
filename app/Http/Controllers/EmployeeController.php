<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\States;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    private $allEmployee;
    private $states;

    function __construct()
    {
        $this->states = States::all();
        $this->allEmployee = Employee::orderBy('name', 'asc')->get();
    }


    public function show()
    {
        $listStates = $this->states;
        return view('employee.employee', compact('listStates'));
    }

    public function create(Request $request)
    {

        $rules = [
            'name' => 'required|string|min:5|max:150',
            'mother_name' => 'required|string|min:5|max:150',
            'cpf' => 'required|string|max:14|unique:employees',
            'rg' => 'required|string|max:30|unique:employees',
            'sus_card' => 'required|string|max:50|unique:employees',
            'is_alive' => 'required',
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
            'rg.max'=> 'RG deve ter no máximo :max caracteres.',
            'sus_card.max'=> 'Número do SUS deve ter no máximo :max caracteres.',
            'death_cause'=> 'Deve ter no máximo de :max caracteres.',
            'address.max'=> 'Endereço deve ter no máximo de :max caracteres.',
            'district.max'=> 'Bairro deve ter no máximo de :max caracteres.',
            'state.max'=> 'Estado deve ter no máximo de :max caracteres.',

        ];

        $request->validate($rules, $feedBack);

        Employee::create([
            'name' => $request->name,
            'mother' => $request->mother_name,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'sus_card' => $request->sus_card,
            'isAlive' => $request->is_alive,
            'deathCause' => $request->death_cause,
            'address' => $request->address,
            'district' => $request->district,
            'city' => $request->city,
            'state' => $request->state,
        ]);

        Alert::success('Sucesso', 'Funcionário cadastrado com sucesso');
        return redirect('/employee');
    }

    public function listEmployee()
    {
       $all_employee = $this->allEmployee;
       return view('employee.list_employee', compact('all_employee'));
    }

    public function listDataEmployee($id)
    {
        $data = Employee::findOrFail($id);
        $listStates = $this->states;
        return view('employee.view_employee_data', compact('data','listStates' ));
    }

    public function updateEmployee(Request $request, $id)

    {

        if (!$id){
            return redirect('/employee');
        }

        $updateEmployee = Employee::find($id);

        $validator = Validator::make($request->all(),
        [
            'name' => 'required|string|min:5|max:150',
            'mother_name' => 'required|string|min:5|max:150',
            'cpf' => "required|string|max:14|unique:employees,cpf,$updateEmployee->id",
            'rg' => "required|string|max:30|unique:employees,rg,$updateEmployee->id",
            'sus_card' => "required|string|max:50|unique:employees,sus_card,$updateEmployee->id",
            'is_alive' => 'required',
            'death_cause' => 'max:350',
            'address' => 'required|string|max:80',
            'district' => 'required|max:80',
            'city' => 'required|string|max:40',
            'state' => 'required|string|max:2',
        ],

        [
            'required'=> 'Campo obrigatório.',
            'name.min'=> 'O nome deve ter no mínimo :min caracteres.',
            'name.max'=> 'O nome deve ter no máximo :max caracteres.',
            'cpf.max'=> 'CPF deve ter no máximo :max caracteres.',
            'rg.max'=> 'RG deve ter no máximo :max caracteres.',
            'sus_card.max'=> 'Número do SUS deve ter no máximo :max caracteres.',
            'death_cause'=> 'Deve ter no máximo de :max caracteres.',
            'address.max'=> 'Endereço deve ter no máximo de :max caracteres.',
            'district.max'=> 'Bairro deve ter no máximo de :max caracteres.',
            'state.max'=> 'Estado deve ter no máximo de :max caracteres.',

        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }



        $updateEmployee->name = $request->input('name');
        $updateEmployee->mother = $request->input('mother_name');
        $updateEmployee->cpf = $request->input('cpf');
        $updateEmployee->rg = $request->input('rg');
        $updateEmployee->sus_card = $request->input('sus_card');
        $updateEmployee->isAlive = $request->input('is_alive');
        $updateEmployee->deathCause = $request->input('death_cause');
        $updateEmployee->address = $request->input('address');
        $updateEmployee->district = $request->input('district');
        $updateEmployee->city = $request->input('city');
        $updateEmployee->state = $request->input('state');

        $updateEmployee->save();

        return response()->json([
            'status'=>200,
            'message'=>'Dados atualizados com sucesso'
        ]);
    }

    public function registerDiseaseEmployee(Employee $employee)
    {
        return view('employee.register_disease_employee', ['employee'=> $employee]);
    }
}
