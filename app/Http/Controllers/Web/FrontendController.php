<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'School',
            'page_header' => 'School',
        ];

        return view('frontend.index')->with(array_merge($this->data, $data));
    }

    public function register()
    {
        $data = [
            'page_title' => 'Create account',
            'page_header' => 'Create account',
        ];

        return view('frontend.register')->with(array_merge($this->data, $data));
    }

    public function storeRegister(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ], [
            'password_confirmation.required' => 'Confirm password required'
        ]);

        $name = $request->get('firstname').' '.$request->get('lastname');
        //store users
        $user = new User();
        $user->name =$name;
        $user->email = $request->get('email');
        $user->username = $request->get('username');
        $user->password = Hash::make($request->get('password'));
        
        if ($user->save()) {
            $user->attachRole(Role::where('name', 'user')->first()->id);

            //store profiles
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->first_name = $request->get('firstname');
            $profile->last_name = $request->get('lastname');
            $profile->save();

            return response()->json([
                'type' => 'success',
                'title' => 'Congratulation!',
                'message' => 'Registration successfully done'
            ]);
    
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Registration failed'
        ]);

    }

    public function noticeList()
    {
        $data = [
            'page_title' => 'All Notices',
            'page_header' => 'Notices',
            'all_notices' => Notice::orderBy('publish_date', 'desc')
                ->orderBy('id', 'desc')
                ->whereDate('publish_date', '<=', Carbon::now())
                ->paginate(5)
        ];

        return view('frontend.notice.index')->with(array_merge($this->data, $data));
    }

    public function showNotice(Notice $notice, $id)
    {
        $data = [
            'page_title' => 'Show Notice',
            'page_header' => 'Show Notice',
            'single_notice' => Notice::findOrFail($id)
        ];

        return view('frontend.notice.show')->with(array_merge($this->data, $data));
    }

    public function uncerConstruction()
    {
        $data = [
            'page_title' => 'Under Construction',
            'page_header' => 'Under Construction',
            'notices' => Notice::orderBy('publish_date', 'desc')
                                ->orderBy('id', 'desc')
                                ->whereDate('publish_date', '<=', Carbon::now())
                                ->get()->take(15)
        ];

        return view('frontend.underconstruction')->with(array_merge($this->data, $data));
    }
}
