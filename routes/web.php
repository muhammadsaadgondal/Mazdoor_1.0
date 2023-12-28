<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('signupPage');
});
Route::get('/loginPage', function () {
    return view('loginPage');
});

// Route::get('/serviceproviderSignupPage', function () {
//     return view('serviceproviderSignupPage');
// });


Route::get('/addSite', "App\HTTP\Controllers\\forms@getSiteForm");
Route::get('/addJob', "App\HTTP\Controllers\\forms@getJobForm");
Route::get('/addSkill', "App\HTTP\Controllers\\forms@getSkillForm");
Route::get('/addOffer', "App\HTTP\Controllers\\forms@getOfferForm");


// Route::get('/','App\Http\Controllers\DBController@index' );
// Route::get('/test','App\Http\Controllers\DBController@index1' );
// Route::get('/read','App\Http\Controllers\DBController@index2' );
// Route::get('/assignments','App\Http\Controllers\DBController@index1');
// routes/web.php

/* Service Provider */
Route::get('/history', 'App\Http\Controllers\SPController@showHistory')->name('history');
Route::get('/assignments', 'App\Http\Controllers\SPController@showAssignments')->name('assignments');
Route::get('/reviews', 'App\Http\Controllers\SPController@showReviews')->name('reviews');
Route::get('/offers', 'App\Http\Controllers\SPController@showOffers')->name('offers');
Route::get('/settings', 'App\Http\Controllers\SPController@showSettings')->name('settings');
Route::get('/search','App\Http\Controllers\SPController@searchView')->name('search');
Route::get('/fetch-more-reviews/{length}', 'App\Http\Controllers\SPController@fetchReviews');
Route::get('/searchReview','App\Http\Controllers\SPController@searchReview')->name('searchReview');

/* Client */
Route::get('/c_history', 'App\Http\Controllers\ClientController@showHistory')->name('c_history');
Route::get('/c_jobs', 'App\Http\Controllers\ClientController@showJobs')->name('c_jobs');
Route::get('/c_reviews', 'App\Http\Controllers\ClientController@showReviews')->name('c_reviews');
Route::get('/c_offers', 'App\Http\Controllers\ClientController@showOffers')->name('c_offers');
Route::get('/c_settings', 'App\Http\Controllers\ClientController@showSettings')->name('c_settings');
Route::get('/searchPerson','App\Http\Controllers\ClientController@search')->name('searchPerson');

/* Fetch calls */


Route::get('/logout', 'App\HTTP\Controllers\loginPage@logout');

Route::get('/switch', 'App\HTTP\Controllers\loginPage@switch');

Route::get('/switch_c', 'App\HTTP\Controllers\loginPage@switchC');

Route::get('/deleteAccount', 'App\HTTP\Controllers\ClientController@deleteAccount');

/* POST */

Route::post("/signupPage", "App\HTTP\Controllers\signupPage@addPerson");

Route::post("/serviceproviderSignupPage", "App\HTTP\Controllers\signupPage@addServiceProvider");

Route::post("/loginPage","App\HTTP\Controllers\loginPage@retrieve");

Route::post("/addSkill", "App\HTTP\Controllers\\forms@addSkill");
Route::post("/addSite", "App\HTTP\Controllers\\forms@addSite");
Route::post("/addOffer", "App\HTTP\Controllers\\forms@addOffer");
Route::post("/addJob", "App\HTTP\Controllers\\forms@addJob");


Route::post("/c_settings","App\HTTP\Controllers\Shared@updateProfile");
Route::post("/settings","App\HTTP\Controllers\Shared@updateProfile");




