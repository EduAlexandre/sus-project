<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusUserController extends Controller
{

    /**
     * Change the status active or inactive
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $status)
    {
        if(Auth::user()->isAdmin)
        {
            $newStatus = $status == 1 ? 0 : 1;
            $user->isActive = $newStatus;
            $user->save();
            return response()->json();
        }
        return view('admintemplate');
    }

    /**
     * Change the status admin or not admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, $status)
    {
        if(Auth::user()->isAdmin)
        {
            $newStatusAdmin = $status == 1 ? 0 : 1;
            $user->isAdmin = $newStatusAdmin;
            $user->save();
            return response()->json();
        }
        return view('admintemplate');
    }
}
