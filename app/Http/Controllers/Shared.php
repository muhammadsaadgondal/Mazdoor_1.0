<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
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
        $image = $request->file('image');
        if ($image) {
            $imageData = file_get_contents($image->getRealPath());
            $imageExt = $image->getClientOriginalExtension();

            // Update the 'image_data' column in the users table with the new image data
            DB::table('person')
            ->where('username', $user->username)
            ->update(['picture' => $imageData , 'pic_ext' => $imageExt]);
        }

        $cover = $request->file('cover');
        if ($cover) {
            $imageData = file_get_contents($cover->getRealPath());
            $imageExt = $cover->getClientOriginalExtension();

            // Update the 'image_data' column in the users table with the new image data
            DB::table('person')
            ->where('username', $user->username)
            ->update(['cover' => $imageData , 'cover_ext' => $imageExt]);
        }

        $user = DB::select("SELECT * FROM person where username = '$user->username'");
        $request->session()->put("user", $user[0]);
        return redirect()->back();
    }

    public function addSite(Request $request)
    {
        $user = $request->session()->get('user');

        // Assuming you have a 'sites' table in your database
        DB::table('site')->insert([
            'location' => $request->input('location'),
            'details' => $request->input('details'),
            'address' => $request->input('address'),
            'person_username'=>$user->username
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Site added successfully!');
    }

    public function deleteSite($siteId)
    {
        // Assuming you have a 'sites' table in your database
        DB::table('site')->where('site_id', $siteId)->delete();

        return redirect()->back()->with('success', 'Site deleted successfully!');
    }
}
