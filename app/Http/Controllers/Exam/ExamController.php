<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\Exam\CreateRequest;
use App\Models\Cat;
use App\Models\Employee;
use App\Models\Exams;
use App\Models\Neoplasm;
use App\Models\Sinan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Employee $employee)
    {
        $cats = Cat::orderBy('name', 'ASC')->get();
        $sinans = Sinan::orderBy('name', 'ASC')->get();
        $neoplasms = Neoplasm::orderBy('name', 'ASC')->get();
        $employee = Employee::with(['exams'])->find($employee->id);
        return view('employee.exams.form', compact('employee', 'cats', 'sinans', 'neoplasms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Cat::orderBy('name', 'ASC')->get();
        $sinans = Sinan::orderBy('name', 'ASC')->get();
        $neoplasms = Neoplasm::orderBy('name', 'ASC')->get();
        $action = route('employees.exams.store');
        return view('employee.exams.form', compact('action', 'cats', 'sinans', 'neoplasms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $request->validated();
        $data = $request->validated();

        if ($request->hasFile('appendant')) {
            $file = $request->file('appendant');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move(public_path('assets/files/exams'), $fileName);
            $data['appendant'] = $fileName;
        }

        Exams::create($data);

        Alert::success('Sucesso', 'Exame cadastrado com sucesso');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee, Exams $exam)
    {
        $employees = Employee::where('id', $employee->id)->with(['exams'])->get();
        return view('employee.exams.show', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee, Exams $exam)
    {

        $cats = Cat::orderBy('name', 'ASC')->get();
        $sinans = Sinan::orderBy('name', 'ASC')->get();
        $neoplasms = Neoplasm::orderBy('name', 'ASC')->get();
        $employees = Employee::where('id', $employee->id)->with(['exams'])->get();
        foreach ($employees as $employee) :
            $action = route('employees.exams.update', [$employee->id, $exam]);
        endforeach;

        return view('employee.exams.form', compact('employee', 'action', 'cats', 'sinans', 'neoplasms', 'exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Employee $employee, Exams $exam)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
