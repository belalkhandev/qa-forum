<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Role;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    public function showRegisterForm()
    {
        $rankings = Answer::select(DB::raw('answers.*, count(*) as answer_count'))
                        ->groupBy('user_id')
                        ->orderBy('answer_count', 'DESC')
                        ->take(10)
                        ->get();
        $data = [
            'page_title' => 'Create Account',
            'page_header' => 'Create Account',
            'categories' => Category::orderBy('name', 'ASC')->get(),
            'sliders' => Slider::latest()->where('status', 1)->take(2)->get(),
            'related_posts' => [],
            'latest_posts' => Question::latest()->take(5)->get(),
            'rankings' => $rankings
        ];

        return view('frontend.register')->with($data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => ' required|confirmed',
            'password_confirmation'=> 'required'
        ], [
            'first_name.required' => 'First name required',
            'last_name.required' => 'Last name required',
        ]);
        
        $user = new User();
        $user->name = $request->get('firstname').' '.$request->get('lastname');
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
                'message' => 'Registration successfully done',
                'redirect' => route('fr.confirm-account', $user->username)
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Registration failed'
        ]);
    }

    public function confirmRegister($uname)
    {
        $user = User::where('username', $uname)->first();

        if (!$user) {
            abort(404, 'Page not found');
        }

        $data = [
            'page_title' => 'Thank you for registration',
            'page_header' => 'Thank you for registration',
            'user' => $user,            
            'sliders' => Slider::latest()->take(2)->get()
        ];

        return view('frontend.confirm-account')->with($data);
    }
}
