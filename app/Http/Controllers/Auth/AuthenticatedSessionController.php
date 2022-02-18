<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Library\Mysms;
use App\Models\User;
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
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(env('TWO_STEP_AUTH'))    {
            if (Auth::validate($credentials)) {
                session(['tmp_credentials' => $credentials]);
                $code = rand(100000, 999999);
                session(['login_code' => $code]);
                $user = User::where('email', $credentials['email'])->first();
                $message = "Your login code for the GIHS is $code";
                $mySms = new Mysms();
                $mySms->sendSMS($user->mobile, $message);
                return redirect('login/code');
            }

        }   else    {
            $request->authenticate();

            $request->session()->regenerate();
    
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }
    /**
     * Display the 2 step auth code view.
     *
     * @return \Illuminate\View\View
     */
    public function code()
    {
        return view('auth.smscode');
    }

    /**
     * Handle an incoming code validation request.
     *
     * @param  \Illuminate\Http\Request; $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function validateCode(Request $request)
    {
        $code = $request->validate([
            'code' => ['required', 'min:6', 'max:6'],
        ]);
        if (session('login_code') == $code['code']) {
            Auth::attempt(session('tmp_credentials'));


            return redirect('/');
        }
        return back()->withErrors([
            'code' => 'Invalid login code',
        ]);
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
