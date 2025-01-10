<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
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
                'text_username'=>'required|email', 
                'text_password'=>'required|min:6|max:16'
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
       
        //get all the users from the database
        //$users = User::all()->toArray();

        //as an object instance of the model`s class
        $usermodel = new User();
        $users = $usermodel->all()->toArray();
        
        echo'<pre>';
        print_r($users);

        
    }

    public function logout()
    {
        echo 'logout';
    }
}
