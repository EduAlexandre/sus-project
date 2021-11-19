<?php

namespace App\Http\Controllers;

use App\Models\Graduate;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
       return view('user.createUser');
    }

    public function callPageListUser()
    {
        $allUser = User::all();
        $condition= 'not_found';
        return view('user.listUser', compact('allUser', 'condition'));
    }

    public function callFirstAccessUser()
    {

        return view('user.firstAccessUser');
    }

    public function showYourselfData()
    {
        $loggedUser = Auth::user()->id;
        $dataUser = User::find($loggedUser);


        return view('user.editYourself', compact( 'dataUser'));
    }

    public function editYourselfData(Request $request)
    {
        $loggedUser = Auth::user()->id;
        $dataUser = User::find($loggedUser);

        $rules = [
            'name' => "required|string|min:3|max:40",
            'email' => "required|unique:users,email,$dataUser->id",
        ];

        $feedBack = [
            'name.required'=> 'Informe o nome de guerra.',
            'name.min'=> 'O nome deve ter no mínimo :min caracteres.',
            'name.max'=> 'O nome deve ter no máximo :max caracteres.',
            'email.required'=> 'Informe um e-mail.',
            'email.email'=> 'Informe um e-mail válido.',
            'email.unique'=> 'E-mail já cadastrado.',
        ];

        $isAdmin = $dataUser->isAdmin;

if ($request->password && !$request->password == null)
{
    $newPassword = Hash::make($request->password);

}else{
    $myPassword = $dataUser->password;
    $newPassword = $myPassword;
}
    $request->validate($rules, $feedBack);

        $dataUser->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $newPassword,
            'isAdmin' => $isAdmin,
        ]);

        Alert::success('Sucesso', 'Dados alterado com sucesso');
        return redirect('dashboard');
    }

    public function changeStatus(Request $request)
    {
       $user = User::find($request->allUsers_id);
       $user->isActive = $request->status;
       $user->save();
       return response()->json();
    }

    public function changeSituationUser(Request $request)
    {
        $user = User::find($request->allUsers_id);
        $user->isAdmin = $request->status;
        $user->save();
        return response()->json();
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:3|max:40',
            'email' => 'required|string|email|max:100|unique:users',
            'isAdmin' => 'required'
        ];

        $feedBack = [
            'name.required'=> 'Informe o nome de guerra.',
            'name.min'=> 'O nome deve ter no mínimo :min caracteres.',
            'name.max'=> 'O nome deve ter no máximo :max caracteres.',
            'email.required'=> 'Informe um e-mail.',
            'email.email'=> 'Informe um e-mail válido.',
            'email.max'=> 'Informe um e-mail com no máximo :max caracteres.',
            'email.unique'=> 'E-mail já cadastrado.',
            'isAdmin.required' => 'Informe se o usuário é ou não adminstrador'
        ];

        $request->validate($rules, $feedBack);

        $newPassword = "@123@";
      User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($newPassword),
            'isAdmin' => $request->isAdmin
        ]);



      Alert::success('Sucesso', 'Usuário cadastrado com sucesso');
      return redirect('user');
    }


    public function update()
    {
        return view('users.editUser');
    }

    public function updatePassword(Request $request)
    {

        $rules = [
            'password' => 'required|min:3|max:40',
            'confirm_password' => 'required|same:password'
        ];

        $feedBack = [
            'password.required'=> 'campo obrigatório.',
            'password.min'=> 'A senha deve ter no mínimo :min caracteres.',
            'password.max'=> 'A senha deve ter no máximo :max caracteres.',
            'confirm_password.same' => 'As senhas não iguais.',
            'confirm_password.required' => 'Confirme sua a nova senha'
        ];

       $verification = $request->validate($rules, $feedBack);
       if (!$verification){
           return redirect('user/update-first-access')->with('toast_error', 'Senha não alterada, tente novamente!!!');
       }
        $userId = Auth::user()->id;
        $newPassword = Hash::make($request->password);
        User::where('id', $userId)->update(['password' => $newPassword, 'firstAccess' => false]);
        return redirect('dashboard')->with('toast_success', 'Senha alterada com sucesso!');
    }
}
