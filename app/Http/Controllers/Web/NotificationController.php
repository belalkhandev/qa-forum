<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotification()
    {
        $output = '';
        if (Auth::user()) {
            $notifications =  Notification::where('notification_to_user_id', Auth::user()->id)->orderBy('id', 'DESC')->take(7)->get();
            if ($notifications->isNotEmpty()) {
               foreach($notifications as $key => $notification) {
                $output .= '<a href="'.route('fr.topic.show', $notification->notification_for_id).'" class="notification-item">';
                $output .= '<div class="user-img">';
                $output .= '<img src="'.asset('frontend/assets/img/avatar-blank.jpg').'" alt="">';
                $output .= '</div>';
                $output .= '<div class="user-action">';
                $output .= '<h3>'.$notification->userFrom->name.' <span>'.$notification->notification_title.'</span></h3>';
                $output .= '<p><i class="fa fa-clock-o"></i> '.Carbon::parse($notification->created_at)->diffForHumans().'</span></p>';
                $output .= '</div>';
                $output .= '</a>';
               }
            } else {
                $output = '<p>No notification found</p>';    
            }

            return $output;
        }

        return response()->json([
            'message' => 'Unathorized action'
        ]);
    }
}
