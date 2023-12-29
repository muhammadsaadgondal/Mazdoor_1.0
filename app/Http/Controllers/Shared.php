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
}
