<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PhpOption\None;

class signupPage extends Controller
{
    public function addPerson(Request $request){
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $username = $request->input('username');
        $picture = NULL;
        $user = DB::select("SELECT * FROM person WHERE username = '$username'");
        if(!$user){
            DB::insert("insert into person
        (f_name, l_name, password, email, phone, username, picture) 
        values
        ('$f_name', '$l_name', '$password', '$email', '$phone', '$username', '$picture')
        ");
        }
        else{
            return view("unsuccessful", ["message" => "User already exists"]);
        }
        return redirect('/loginPage');
    }

    public function addServiceProvider(Request $request){
        $address = $request->input('address');
        $location = $request->input('location');
        $user = $request->session()->get('user');
        if($user){
            $hai = DB::select("SELECT * FROM serviceprovider where username = '$user->username'");
            if(!$hai){
                DB::insert("INSERT INTO serviceprovider (username, `address`, `location`) values ('$user->username', '$address', '$location')");
            }
        }
    }

    // public function utha(Request $request){
    //     return redirect("/welcome");
    // }
}
