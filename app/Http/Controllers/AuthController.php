<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Exception;
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

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $payload = $request->validated();
        try {
            unset($payload['password-confirm']);
            $payload['password'] = Hash::make($payload['password']);
            User::create($payload);
            return redirect('/')->with('status', 'Registrasi akun berhasil, silahkan login');
        } catch (Exception $e) {
            return redirect('register')->with('status', $e->getMessage());
        }
    }
}
