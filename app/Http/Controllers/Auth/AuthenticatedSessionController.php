<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(LoginRequest $request)
    {

        $rules = [
            'email' => 'required|string|email',
            'password' => 'required',
        ];

        $feedBack = [
            'email.required' => 'Informe um e-mail.',
            'email.email' => 'Informe um e-mail válido.',
            'password.required' => 'Infome a graduação.',
        ];



        $request->validate($rules, $feedBack);

        $request->authenticate();

        if (Auth::user()->isActive && Auth::user()->firstAccess == false) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        if (Auth::user()->firstAccess && Auth::user()->isActive) {
            return redirect('/user/first');
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/')->with('toast_error', 'Usuário inativo, entre em contato com o administrador do sistema!');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
