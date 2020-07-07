<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changePassword()
    {
        $data = [
            'page_title' => 'Change Password',
            'page_header' => 'Change Password',
        ];

        return view('dashboard.user.change-password')->with(array_merge($this->data, $data));
    }


    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ],[
            'password.required' => 'Enter new password'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->get('current_password'), $user->password)) {
            return response()->json([
                'type' => 'warning',
                'title' => 'Current password is wrong',
                'message' => ''
            ]);
        }

        $password = Hash::make($request['password']);

        $user->password = $password;
        
        if ($user->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Password Updated',
                'message' => 'Password change  successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed',
            'message' => 'Password failed to update'
        ]);
    }
}
