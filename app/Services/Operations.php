<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

Class Operations{

    public static function decryptId($Value){
        
        //check if Value is encrypted
        try {
            $Value = Crypt::decrypt($Value);
       } catch (DecryptException $e) {
           return redirect()->route('home');
       }
       return $Value;
    }
}