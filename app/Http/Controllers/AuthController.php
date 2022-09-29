<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $payload = $request->validated();
        $user = User::where('name', $payload['name'])->first();
        if (!$user) {
            return redirect()->back()->with('status', 'Data user tidak ditemukan');
        }
        if (Hash::check($payload['password'], $user->password)) {
            if ($user->tahun === $payload['tahun']) {
                Auth::login($user);
                return redirect('/home');
            }
            return redirect()->back()->with('status', 'Tahun salah');
        }
        return redirect()->back()->with('status', 'Password salah');
    }

    public function logout()
    {
        Auth::logout(request()->user());
        return redirect('/');
    }
}
