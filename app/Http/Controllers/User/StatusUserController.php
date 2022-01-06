<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        $newStatus = $status == 1 ? 0 : 1;
        $user->isActive = $newStatus;
        $user->save();
        return response()->json();
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
        $newStatusAdmin = $status == 1 ? 0 : 1;
        $user->isAdmin = $newStatusAdmin;
        $user->save();
        return response()->json();
    }
}
