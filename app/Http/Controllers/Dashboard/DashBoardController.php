<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Employee;
use App\Models\Neoplasm;
use App\Models\Sinan;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $totalData =  Employee::with('exams')->get();
        $employees = 0;
        $exams = 0;

        foreach ($totalData as $item) :
            $employees = $item->count();
            foreach ($item->exams as $exam) :
                $exams = $exam->count();
            endforeach;
        endforeach;
        return view('admintemplate', compact('totalData', 'exams', 'employees'));
    }

    public function show(Employee $dashboard)
    {   $neoplams = Neoplasm::all();
        $cats = Cat::all();
        $sinans = Sinan::all();
        $data =  Employee::with('exams')->where('id', $dashboard->id)->get();

        return view('employee.exams.show', compact('data', 'neoplams', 'cats', 'sinans'));
    }
}
