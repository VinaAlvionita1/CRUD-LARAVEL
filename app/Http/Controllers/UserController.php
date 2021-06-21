<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller{
    public function login(Request $request){
        $username=$request->post('username');
        $password=$request->post('password');

        // var_dump($username);
        // var_dump($password);
        // die;

        if($username !== 'admin' && $password !== 'password'){
            return \response()->redirectTo('/');
        }else{
            return \response()->redirectTo('/home');
        }
    }
}