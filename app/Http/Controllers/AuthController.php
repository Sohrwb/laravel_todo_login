<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|min:5|email|exists:users',
            'password' => 'required|min:5'

        ]);

        $user =  User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'password inccorect');
        }
        Auth::login($user);
        return redirect()->route('profile');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:5|required',
            'email' => 'required|min:5|email|unique:users,email',
            'password' => 'required|min:5|confirmed'
        ]);

        $user = User::create([
            "name" => $request->name,
            "password" => hash::make($request->password),
            "email" => $request->email
        ]);
        return redirect()->route('home')->with('success', 'user create');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile',compact('user'));
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
