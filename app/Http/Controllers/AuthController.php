<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function regist(Request $request) 
    {
        return view('pages.register');
    }

    public function dataRegist (Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone' => 'required',
            'address' => 'required'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('login');
    }

    public function login(Request $request) {
        return view('pages.login');
    }

    public function authenticate(Request $request) {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), 
            $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();
        return redirect('/');
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
