<?php

namespace App\Http\Controllers;

use App\Http\Requests\employee\updateEmployeeRequest;
use App\Http\Requests\employeeDisease\createRequest;
use App\Http\Requests\employee\createEmployeeRequest;
use App\Models\Employee;
use App\Models\Exams;
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
        return view('employee.create_employee', compact('listStates'));
    }

    public function create(createEmployeeRequest $request)
    {
        $data = $request->validated();
        Employee::create($data);

        Alert::success('Sucesso', 'Funcionário cadastrado com sucesso');
        return redirect('/employee/list');
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
        return view('employee.edit_employee', compact('data','listStates' ));
    }

    public function updateEmployee(updateEmployeeRequest $request, Employee $employee)
    {
       $data = $request->validated();
       $employee->update($data);

        Alert::success('Sucesso', 'Funcionário editado com sucesso');
        return redirect('/employee/list');
    }

    public function createExamEmployee(createEmployeeRequest $createRequest, Employee $employee)
    {

        return view('employee.create_exam_employee', ['employee'=> $employee]);
    }

    public function createDiseaseEmployee(createEmployeeRequest $createRequest)
    {
        dd($createRequest);
       $data = $createRequest->validated();

       if ($createRequest->hasFile('exame_chest_file'))
       {
           $file = $createRequest->file('exame_chest_file');
           $extension = $file->extension();
           $fileName = md5($file->getClientOriginalName().strtotime("now")) . "." .$extension;
           $file->move(public_path('assets/files/exams'), $fileName);
           $data->exame_chest_file = $fileName;
       }

       Exams::create($data);

        return redirect('employee/list');
    }
}
