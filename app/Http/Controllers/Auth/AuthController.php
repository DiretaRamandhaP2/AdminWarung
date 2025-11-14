<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Validation\ValidationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $validate;

    public function __construct(
        ValidationService $validationService
    ) {
        $this->validate = $validationService;
    }
    public function login(){
        return view('pages.login.login');
    }
    public function auth(Request $request)
    {
        $rules = [
            'username' => 'required|string|unique:users,username',
            'password'=> 'required|min:6',
        ];

        $validator = $this->validate->validate($request->all(),$rules);

        if(Auth::attempt($validator)){
            return redirect()->route('dashboard')->with('success',true);
        }

        return redirect()->back()->withErrors($validator);

    }
}
