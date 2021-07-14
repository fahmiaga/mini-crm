<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:web', ['except' => ['login']]);
    // }

    public function index()
    {

        return view('authLogin/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function loginWithJwt(Request $request)
    {
        $req = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $req['email'])->first();
        // dd($user);
        if (!$user) {
            return redirect()->back()->with('message', 'User not exist');
        } else {
            if (!Hash::check($req['password'], $user->password)) {
                return redirect()->back()->with('message', 'Wrong password');
            } else {
            }
        }

        if (!$token = auth()->attempt($req)) {
            return redirect()->back();
        }

        Session::put('token', $token);

        return redirect('companies');
    }

    public function logoutWithJwt(Request $request)
    {
        Session::forget('token');
        return redirect('/');
    }
}
