<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], customAttributes: $this->attributes());


        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('admin/dashboard');
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        auth('admin')->logout();
        return redirect()->route('admin.login.index');
    }

    public function attributes()
    {
        return [
            'email' => 'E-Posta',
            'password' => 'Şifre',
        ];
    }
}
