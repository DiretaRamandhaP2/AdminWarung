<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use PhpParser\Node\Expr\New_;

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

    public function authRegister(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:15',
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->numbers(),
                'confirmed',
            ],
            'password_confirmation' => 'required',
            'name_store' => 'sometimes|string|max:255',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            $errors = $validate->errors()->all();

            $errorMessage = implode(' ', $errors);
            alert()->error('Errors', $errorMessage);
            return redirect()->route('register');
        }

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if (isset($request->store_name)) {
            $user->role = 'store_owner';
        }
        $user->save();

        if (isset($request->store_name)) {
            $store = new Store();
            $store->store_name = $request->store_name;
            $store->owner_id = $user->id;
            $store->save();
        }

        toast('Registrasi Berhasil', 'success');
        return redirect()->route('login');
    }
}
