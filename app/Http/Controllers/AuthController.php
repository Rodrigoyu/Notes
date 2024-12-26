<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request){
        //form validate
        $request->validate(
            [
                'text_username'=>'required|email', 'text_password'=>'required|min:6|max:16'
            ],
            [
                'text_username.required'=>'Username e obrigadorio',
                'text_username.email'=>'Email invalido',
                'text_password.required'=>'O password e obrigadorio',
                'text_password.min'=>'Minimo de caracteres é :min',
                'text_password.max'=>'O maximo de caracteres é :max',

            ]
        );

       //get user input
       $username = $request->input('text_username');
       $password = $request->input('text_password');
       echo 'OK!';
    }

    public function logout()
    {
        echo 'logout';
    }
}
