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
                        ->where('approve', 1)
                        ->paginate(25)
        ];

        return view('dashboard.user.index')->with(array_merge($this->data, $data));
    }

    public function newRegistered()
    {
        $data = [
            'page_title' => 'New Registered Users',
            'page_header' => 'New Registered Users',
            'users' => User::whereHas('roles', function($q){
                            $q->where('name', 'user');
                        })
                        ->where('approve', 0)
                        ->where('approve_at', null)
                        ->paginate(25)
        ];

        return view('dashboard.user.new-user')->with(array_merge($this->data, $data));
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

    public function approve(User $user, $id)
    {
        $user = $user->find($id);
        $user->status = 1;
        $user->approve = 1;
        $user->approve_at = date('Y-m-d H:i:s');
        
        if ($user->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Thank you!',
                'message' => 'User is pprove now ',
                'redirect' => route('users.new')
            ]); 
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Failed to Deactive'
        ]);
    }
}
