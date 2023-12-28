<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ClientController extends Controller
{
    public function showHistory(Request $request){
        $user = $request->session()->get("user");
        return view("c_history",["user"=> $user]);
    }
    public function showJobs(Request $request)
    {
        $user = $request->session()->get("user");
        $username = $user->username; // Assuming the username is within a `username` property
    
        // Retrieve only sites with matching username
        $sites = DB::table('site')
            ->where('person_username', $username)
            ->get();
    
        return view("c_jobs", [
            "sites" => $sites,  // Pass the collection of matching sites
            "user" => $user
        ]);
    }
    
    public function showReviews(Request $request){
        $user = $request->session()->get("user");
        $sp=DB::table("serviceprovider")->where("username",$user->username);
        $reviews = DB::table('review')->limit(1)->get();
        return view('c_reviews', ['reviews' => $reviews,'user'=> $user]);
        
        // return view("c_reviews",["user"=> $user]);
    }
    public function showOffers(Request $request){
        $user = $request->session()->get("user");
        $offers = DB::table('offer')
        ->join('job', 'offer.job_id', '=', 'job.job_id')
        ->join('site', 'job.site_id', '=', 'site.site_id')
        ->select('offer.*')
        ->where('site.person_username', $user->username)
        ->get();

        return view('c_offers', ['offers' => $offers,'user'=> $user]);
        // return view("c_offers",["user"=> $user]);
    }
    public function showSettings(Request $request){
        $user = $request->session()->get("user");
        $sp=DB::table("serviceprovider")->where("username",$user->username);
        $user = $request->session()->get("user");
        return view("c_settings",["user"=> $user]);
    }

    public function deleteAccount(Request $request){
        $user = $request->session()->get('user');
        DB::delete("DELETE FROM person where username='$user->username'");
        return redirect('/loginPage');
    }
}