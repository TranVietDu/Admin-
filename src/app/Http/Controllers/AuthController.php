<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $check = $this->create($data);
        return redirect("login");
    }

    public function index()
    {
        return view('login');
    }
    public function login(LoginRequest $request)
    {
        $remember= $request->has('remember') ? true : false;
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials,$remember)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('relogin');
        }
    }

    public function home()
    {
        $admin = Auth::user();
        return view('admin.home', ['user' => $admin]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('relogin');
    }
}
