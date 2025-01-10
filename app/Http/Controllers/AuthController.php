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
       
        $user = User::where('username', $username)->where('deleted_at', null)->first();
        //check if user exist
        if(!$user){
            return redirect()
                   ->back()
                   ->withInput()
                   ->with('loginError', 'usename ou password esta incorretos.');
        }

        //check is password exist
        if(!password_verify($password, $user->password)){
            return redirect()
                   ->back()
                   ->withInput()
                   ->with('loginError', 'usename ou password esta incorretos.');
        }

        //update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        //login user
        session([
            'user '=>[
                'id'=>$user->id,
                'username'=> $user->username
        ]]);

        echo'login com sucesso!';
        

        
    }

    public function logout()
    {
        echo 'logout';
    }
}
