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
        // dd($token);
        Session::put('token', $token);
        Session::put('user', $user);

        // $token_sanctum = $user->createToken('token-sanctum')->plainTextToken;
        // dd($token_sanctum);
        return redirect('companies');
    }

    public function logoutWithJwt()
    {
        Session::forget('token');
        Session::forget('user');
        return redirect('/');
    }

    public function loginWithSanctum(Request $request)
    {
        $req = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $req['email'])->first();
        $token = $user->createToken('token-sanctum')->plainTextToken;

        $response = [
            'status' => 200,
            'message' => 'Success login',
            'token' => $token
        ];

        return response()->json($response, 200);
    }
}
