<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __constructor()
    {
       Auth::user()->isAdmin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->isAdmin)
        {
            $users = User::orderBy('name', 'ASC')->get();
            return view('user.index', compact('users'));
        }
        return view('admintemplate');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAdmin)
        {
            $action = route('users.store');
            return view('user.form', compact('action'));
        }
        return view('admintemplate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $createRequest)
    {
        if(Auth::user()->isAdmin)
        {
            $createRequest->validated();
            $newPassword = "123456";
            User::create([
                'name' => $createRequest->name,
                'email' => $createRequest->email,
                'password' => $newPassword,
                'isAdmin' => $createRequest->isAdmin
            ]);

            Alert::success('Sucesso', 'Usuário cadastrado com sucesso');
            return redirect()->route('users.index');
        }
        return view('admintemplate');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if(Auth::user()->isAdmin)
        {
            return view('user.status', compact('user'));
        }

        return view('admintemplate');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $action = route('users.update', $user->id);
        return view('user.form', compact('user', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {

        $data = $request->validated();
        $user->update($data);

        Alert::success('Sucesso', 'Dados atualizados com sucesso');
        return redirect()->back();
    }
}
