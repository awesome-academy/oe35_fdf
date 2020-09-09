<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(Request $requestAuth)
    {
        $u = $requestAuth['email'];
        $p = $requestAuth['password'];
        if(Auth::attempt(['email' => $u, 'password' => $p]))
        {
            if($this->authorize('admin'))
            {
                return redirect()->route('admin');
            }
            if($this->authorize('customer'))
            {
                return redirect()->route('homepage');
            }
        }else {
            return redirect()->route('login');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('homepage');
    }

}
