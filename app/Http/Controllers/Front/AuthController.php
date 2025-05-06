<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        // dd('werwe');
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        // $this->validate($request, [
        //     'email'   => 'required|email|exists:users,email',
        //     'password' => 'required|min:8'
        // ]);

        // if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

        //     return redirect()->intended(route('home'));
        // }
        // toastr()->error('Invalid email or password');
        // return back()->withInput($request->only('email', 'remember'));

        $validator = Validator::make($request->all(), [
            'email'   => 'required|email|exists:users,email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            return response()->json(['success' => true, 'redirect' => route('home')]);
        }

        return response()->json(['error' => 'Invalid email or password'], 401);
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|min:8|confirmed'
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => 'user',
        //     'status' => 1,
        // ]);

        // Auth::guard('web')->login($user);
        // toastr()->success('Account created successfully');
        // return redirect()->route('user.home');

        if ($request->expectsJson()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422);
            }
            $validated = $validator->validated();

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'user',
            ]);

            Auth::guard('web')->login($user);

            return response()->json([
                'success' => true,
                'redirect' => route('home')
            ]);
        }

        return abort(403, 'Expected JSON');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        // return redirect()->route('user.login');
        return redirect()->route('home');
    }
}
