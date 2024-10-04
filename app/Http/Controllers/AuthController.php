<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function signupsave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }
        $userform = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        if($userform)
        {
            return response()->json([
                'status'=>200,
                'message'=>"Save Successfully",
            ]);
        }

    }

    public function signin(Request $request)
    {
        // $sessionData = $request->session()->all();
        // dd($sessionData);
        $validator = Validator::make($request->all(), [
            'emailsignin' => 'required|email',
            'passwordsignin' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors(),
            ]);
        }

        $credentials = [
            'email' => $request->input('emailsignin'),
            'password' => $request->input('passwordsignin'),
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            return response()->json([
                'status' => 200,
                'message' => 'Login successfully!',
                'redirect_url' => route('home')
            ]);
        } else {

            return response()->json([
                'status' => 401,
                'message' => "Invalid email or password",
            ]);
        }

    }
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home')->with('message', 'Logged out successfully!');
}
}
