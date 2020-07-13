<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Services\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            abort(401, 'Unauthorized');
        }

        $profile = Profile::where('user_id', Auth::user()->id)->first();

        $data = [
            'page_title' => 'Profile page',
            'page_header' => 'Profile page',
            'profile' => $profile
        ];

        return view('frontend.profile')->with(array_merge($this->data, $data));
    }

    public function update(Request $request)
    {
        if (!Auth::user()) {
            abort(401, 'Unauthorized');
        }

        $this->validate($request, [
            'profile_photo' => 'mimes:jpg,jpeg,png',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $profile = Profile::where('user_id', Auth::user()->id)->first();

        if ($request->hasFile('profile_photo')) {
            $path = Utility::file_upload($request, 'profile_photo', 'profiles');

            if ($profile->photo) {
                unlink($profile->photo);
            }

            $profile->photo = $path;
        }

        $profile->first_name = $request->get('first_name');
        $profile->last_name = $request->get('last_name');
        $profile->qualification = $request->get('qualification');
        $profile->district = $request->get('home_district');
        $profile->address = $request->get('current_address');
        $profile->website = $request->get('website_link');
        $profile->facebook = $request->get('facebook_link');
        $profile->youtube = $request->get('youtube_link');
        $profile->linkedin = $request->get('linkedin_link');

        if ($profile->save()) {
            $user = Auth::user();
            $user->name = $profile->first_name.' '.$profile->last_name;
            $user->save();

            return response()->json([
                'type' => 'success',
                'title' => 'Updated!',
                'message' => 'Profile Updated successfully',
                'redirect' => route('fr.profile')
            ]);


        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Registration failed'
        ]);
    }

}
