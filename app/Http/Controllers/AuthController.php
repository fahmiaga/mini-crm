<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;


class AuthController extends Controller
{
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

        if (!$token = auth()->attempt($req)) {
            return redirect()->back();
        }
        return redirect('companies');
    }
}
