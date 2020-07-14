<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'User List',
            'page_header' => 'User List',
            'users' => User::whereHas('roles', function($q){
                            $q->where('name', 'user');
                        })
                        ->whereHas('profile')
                        ->paginate(25)
        ];

        return view('dashboard.user.index')->with(array_merge($this->data, $data));
    }

    public function deActive(User $user, $id)
    {
        $user = $user->find($id);
        $user->status = 0;
        
        if ($user->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Updated!',
                'message' => 'This user is now deactivated',
                'redirect' => route('user.list')
            ]); 
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Failed to Deactive'
        ]);
    }

    public function userActive(User $user, $id)
    {
        $user = $user->find($id);
        $user->status = 1;
        
        if ($user->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Updated!',
                'message' => 'This user is now actived',
                'redirect' => route('user.list')
            ]); 
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Failed to Deactive'
        ]);
    }
}
