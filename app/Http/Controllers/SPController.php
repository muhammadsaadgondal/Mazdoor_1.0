<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SPController extends Controller
{

    public function showReviews(Request $request)
    {

        $user = $request->session()->get("user");

        $serviceprovider = DB::select("SELECT * FROM serviceprovider where username = '$user->username'");
        $reviews = DB::table('review')
            ->join('job', 'review.job_id', '=', 'job.job_id')
            ->join('person', 'review.person_username', '=', 'person.username')
            ->select('review.*')
            ->where('person.username', $user->username)
            ->get();
        return view('reviews', ['reviews' => $reviews, 'user' => $user, 'serviceprovider' => $serviceprovider[0]]);
    }
    public function fetchReviews(Request $request)
    {
        // Get the current length from the request
        $currentLength = $request->query('length', 0);

        // Retrieve all reviews from the review table
        $allReviews = DB::table('review')->get()->toArray(); // Convert to array

        // Calculate the total count of reviews
        $reviewCount = count($allReviews);

        // Check if there are new reviews to fetch
        if ($reviewCount > $currentLength) {
            // Calculate the number of new reviews
            $newReviewsCount = $reviewCount - $currentLength;

            // Fetch only the new reviews
            $newReviews = array_slice($allReviews, -$newReviewsCount, $newReviewsCount);

            // Return the new reviews as JSON
            return response()->json(['reviews' => $newReviews]);
        } else {
            // If there are no new reviews, return an empty array
            return response()->json(['reviews' => []]);
        }
    }

    public function searchReview(Request $request)
    {
        $keywords = $request->input('keywords');

        // Fetch persons from the database based on the keywords
        $reviews = DB::select("SELECT * FROM review WHERE comment LIKE ? OR review_id LIKE ? OR stars LIKE ?", ["%{$keywords}%", "%{$keywords}%", "%{$keywords}%"]);

        return $reviews;
    }


    public function showHistory(Request $request)
    {

        $user = $request->session()->get("user");
        $serviceprovider = DB::select("SELECT * FROM serviceprovider where username = '$user->username'");
        return view('history', ['user' => $user, 'serviceprovider' => $serviceprovider[0]]);
    }
    public function showAssignments(Request $request)
    {
        $user = $request->session()->get("user");
        $serviceprovider = DB::select("SELECT * FROM serviceprovider where username = '$user->username'");

        $skills = DB::select("SELECT * FROM skill where serviceprovider_username = '$user->username'");
        if ($serviceprovider) {
            $assignments = DB::table('assignment')
                ->join('offer', 'assignment.offer_id', '=', 'offer.offer_id')
                ->where('offer.serviceprovider_username', $user->username)
                ->select('assignment.*', 'offer.*')
                ->get();

            return view('assignments', [
                'user' => $user,
                'serviceprovider' => $serviceprovider[0],
                'assignments' => $assignments,
                'skills'=>$skills
            ]);
        }
    }

    public function searchView(Request $request)
    {
        // Fetch all persons from the database
        $persons = DB::table('person')->get();

        $user = $request->session()->get("user");
        $serviceprovider = DB::select("SELECT * FROM serviceprovider where username = '$user->username'");

        return view("search", ['user' => $user, "persons" => $persons, "serviceprovider" => $serviceprovider[0]]);
    }
    public function search(Request $request)
    {
        $keywords = $request->input('keywords');

        // Fetch persons from the database based on the keywords
        $persons = DB::select("SELECT * FROM person WHERE f_name LIKE ? OR l_name LIKE ? OR email LIKE ?", ["%{$keywords}%", "%{$keywords}%", "%{$keywords}%"]);

        return $persons;
    }
    public function showOffers(Request $request)
    {
        $user = $request->session()->get("user");
        $serviceprovider = DB::select("SELECT * FROM serviceprovider where username = '$user->username'");
        $offers = DB::table('offer')
            ->join('job', 'offer.job_id', '=', 'job.job_id')
            ->join('site', 'job.site_id', '=', 'site.site_id')
            ->select('offer.*')
            ->where('site.person_username', $user->username)
            ->get();
        return view('offers', ['user' => $user, 'serviceprovider' => $serviceprovider[0], 'offers' => $offers]);
    }
    public function showSettings(Request $request)
    {
        $user = $request->session()->get("user");
        $serviceprovider = DB::select("SELECT * FROM serviceprovider where username = '$user->username'");

        return view('settings', ['user' => $user, 'serviceprovider' => $serviceprovider[0]]);
    }
}
