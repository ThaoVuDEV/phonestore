<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function adminIndex()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }
    public function userIndex()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('client.auth.login');
    }

    public function Adminlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công');
        }

        return redirect()->route('admin.login')->with('error', 'Email hoặc mật khẩu không chính xác');
    }

    public function UserLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
        }

        return redirect()->route('user.login')->with('error', 'Email hoặc mật khẩu không chính xác');
    }
    public function logout(Request $request)
    {
        $user = Auth::user();
    
        if ($user->role === 'admin') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('admin.login');
        }
    
        if ($user->role === 'user') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('user.login');
        }
    }
    public function registerForm()
    {
        return view('client.auth.signup');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = $this->userService->register([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);


        Auth::login($user);

        return redirect()->route('dashboard.index')->with('success', 'Đăng ký thành công');
    }
    public function registerUser(UserRequest $request)
    {
       
        try {
            $userdata = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'password' => Hash::make($request->input('password')),
                'role' => 'user',
            ];
        
            $this->userService->userRegister($userdata);
            return redirect()->route('user.login')->with('success', 'Đăng ký thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đăng ký thất bại! Lỗi: ' );

        }
    }
    public function ProfileUser()
    {  
        $user = Auth::user();
        if ($user->role === 'user') {
        
            return view('client.auth.profile',compact('user'));
        }
        
       
    }
}
