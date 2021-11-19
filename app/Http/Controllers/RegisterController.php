<?php

namespace App\Http\Controllers;

use App\Models\Graduate;
use App\Models\PolicemanRegister;
use App\Models\PolicemanPainting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{

    private $condition;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()   {

        /**
         * found
         * not_found
         */
        $this->condition = '';

        return view('record_of_occurrences.index',[ 'condition' => $this->condition]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $allPolicemanPainting = PolicemanPainting::all()->sortBy('name');
        $allGraduate = Graduate::all();

        if ($request->fullname || $request->warname || $request->register  !== null)
        {
            $searchPoliceman = PolicemanRegister::where('warname', 'like', '%'.$request->input('warname').'%')
                ->where('fullname', 'like', '%'.$request->input('fullname').'%')
                ->where('register', 'like', '%'.$request->input('register').'%')
                ->get();

            (!$searchPoliceman) ? $this->condition = 'not_found' : (count($searchPoliceman) > 0 ? $this->condition = 'found' : $this->condition = 'not_found' );
            $condition = $this->condition;
        }else{
            Alert::warning('Atenção', 'Informe algum campo para pesquisa');
            return view('record_of_occurrences.index');
        }

       return view('record_of_occurrences.index',compact('searchPoliceman', 'condition', 'allPolicemanPainting', 'allGraduate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
