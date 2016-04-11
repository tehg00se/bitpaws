<?php

namespace App\Services;

use Auth;

class UserApiVerification {

    public function verify($username, $password){

        $credentials = [
            'email' => $username,
            'password' => $password,
        ];
        if (Auth::once($credentials)) {
            return Auth::user()->id;
        } else {
            return false;
        }
    }

}
