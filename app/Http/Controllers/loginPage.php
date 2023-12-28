<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class loginPage extends Controller
{
    public function retrieve(Request $request){
        $username = $request->input("username");
        $password = $request->input("password");
        $user = DB::select("SELECT * FROM person WHERE username = '$username'");
        if($user){
            if($user[0]->password == $password){
                $request->session()->put("user", $user[0]);
                return redirect('/c_jobs');
            }
            return view("unsuccessful", ['message' => "Password not correct"]);
        }
        return view("unsuccessful", ['message'=>"User does not exist"]);
    }

    public function showInformation(Request $request){
        $user = $request->session()->get("user");
        if($user){
            return view("information" , ["user" => $user]);
        }
        return redirect("/loginPage");
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect("/loginPage");
    }

    public function switch(Request $request){
        $user = $request->session()->get('user');
        $user = DB::select("SELECT * FROM serviceprovider WHERE username='$user->username'");
        if($user){
            return redirect('/assignments');
        }
        else
            return redirect('/serviceproviderSignupPage');
    }

    public function switchC(Request $request){
        return redirect('/c_jobs');
    }
}
