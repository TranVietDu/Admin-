<?php

namespace App\Http\Controllers;

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
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|required_with:repassword|same:repassword',
            'repassword' => 'required|min:6'
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect("login");
    }

    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'min:8|required',
        ],[
            'email.required'=> 'Email không được để trống',
            'password.required'=> 'Mật khẩu không được để trống',
            'password.min'=> 'Password phải có ít nhất 8 kí tự',
        ]);
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
