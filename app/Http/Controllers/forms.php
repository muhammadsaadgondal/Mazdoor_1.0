<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;


class forms extends Controller
{
    function getOfferForm(Request $request){
        $user = $request->session()->get('user');
        if($user){
            $serviceProvider = DB::select("SELECT * FROM serviceprovider WHERE username = '$user->username'");
            if($serviceProvider){

            }
        }
    }

    function getSkillForm(Request $request){
        $user = $request->session()->get('user');
        if($user){
            return view('addSkill');
        }
    }

    function getSiteForm(Request $request){
        $user = $request->session()->get('user');
        if($user){
            return view('addSite');
        }
    }

    function getJobForm(Request $request){
        
    }



    function addOffer(Request $request){
        redirect('addOffer');
    }

    function addSkill(Request $request){
        $user = $request->session()->get('user');
        $name = $request->input("name");
        $working_since = $request->input("working_since");
        $description = $request->input("description");
        if($user){
            $serviceProvider = DB::select("SELECT * FROM serviceprovider WHERE username = '$user->username'");
            if($serviceProvider){
                DB::insert("INSERT INTO 
                    skill
                    (name, working_since, description, serviceprovider_username, images)
                    values
                    ($name, $working_since, $description, $user->username, NULL)
                ");
            }
        }
    }

    function addComment(Request $request){

    }

    function addReview(Request $request){

    }

    function addAssignment(Request $request){
        
    }

    function addSite(Request $request){
        $user = $request->session()->get('user');
        if($user){
            $address = $request->input('address');
            $location = $request->input('location');
            $description = $request->input('description');
            DB::insert("INSERT into `site` 
            (`address`, `location`, `description`, person_username)
            values
            ('$address', '$location', '$description', '$user->username')
            ");
        }
    }

    function addJob(Request $request){
        
    }
}
