<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login()
    {
       return view('Backend.login.login');
    }


    public function post(Request $request)
    {
        $remember = $request -> has ('remember_me')?true:false;
        if(auth() -> attempt([
            'email'=>$request->email,
            'password' => $request ->password
        ],$remember)){
            return redirect()->to('/Admin/Home');
        }
    } 
}
