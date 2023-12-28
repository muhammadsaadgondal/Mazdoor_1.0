<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Shared extends Controller
{
    public function updateProfile(Request $request){
        $user = $request->session()->get('user');
        $f_name = $request->input('f_name');
        $l_name = $request->input('l_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        DB::update("
                    UPDATE person
                    SET email = '$email', f_name = '$f_name', l_name = '$l_name', phone = '$phone'
                    WHERE username = '$user->username'
        ");
        $user = DB::select("SELECT * FROM person where username = '$user->username'");
        $request->session()->put("user", $user[0]);
        return redirect("/settings");
    }
}
