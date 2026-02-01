<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function __construct() {}

    public function login()
    {
        return view('pages.auth.login');
    }
    public function auth(Request $request)
    {
        $rules = [
            'username' => 'required|string',
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
            ],
        ];

        $crendetials = $request->only('username', 'password');

        $validate = Validator::make($crendetials, $rules);

        if ($validate->fails()) {
            return redirect()->route('login')->with('error', 'Validation failed');
        }

        if (Auth::attempt($crendetials)) {
            toast('Berhasil Login', 'success');
            return redirect()->route('dashboard.admin');
        } else {
            toast('Username atau Password salah', 'question');
            return redirect()->route('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        toast('Berhasil Logout', 'success');
        return redirect()->route('landing-page');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function authRegister(Request $request) {}
}
