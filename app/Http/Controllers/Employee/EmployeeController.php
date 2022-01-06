<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\CreateRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;
use App\Models\Situation;
use App\Models\States;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('name', 'ASC')->get();
        $situations = Situation::all();
        return view('employee.index', compact('employees', 'situations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = States::orderBy('name', 'ASC')->get();
        $action = route('employees.store');
        $situations = Situation::all();
        return view('employee.form', compact('states', 'action', 'situations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        Employee::create($data);

        Alert::success('Sucesso', 'Funcionário cadastrado com sucesso');
        return redirect()->route('employee.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {

        $states = States::orderBy('name', 'ASC')->get();
        $situations = Situation::all();
        $action = route('employees.update', $employee->id);
        return view('employee.form', compact('employee', 'action', 'states', 'situations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Employee $employee)
    {

        $data = $request->validated();
        $employee->update($data);

        Alert::success('Sucesso', 'Dados atualizados com sucesso');
        return redirect()->route('employees.index');
    }
}
