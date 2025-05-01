<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        // dd('werwe');
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        // dd('wer');
        $this->validate($request, [
            'email'   => 'required|email|exists:users,email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended(route('user.home'));
        }
        toastr()->error('Invalid email or password');
        return back()->withInput($request->only('email', 'remember'));
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        // dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 1,
        ]);

        Auth::guard('web')->login($user);
        toastr()->success('Account created successfully');
        return redirect()->route('user.home');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        // return redirect()->route('user.login');
        return redirect()->route('home');
    }
}

