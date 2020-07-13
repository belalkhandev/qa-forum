<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $notifications =  Notification::where('notification_to_user_id', Auth::user()->id)->orderBy('id', 'DESC')->take(50)->get();
            $data = [
                'page_title' => 'Notifications',
                'page_header' => 'Notifications List',
                'notifications' => $notifications
            ];

            if ($notifications->isNotEmpty()) {
                
                foreach($notifications as $notification) {
                    $update_notification = Notification::find($notification->id);
                    if ($update_notification->seen != 1) {
                        $update_notification->seen = 1;
                        $update_notification->save();
                    }
                }
            }
    
            return view('frontend.notifications')->with(array_merge($this->data, $data));
            
        } else {
            abort(401, 'Unauthorized access');
        }
    }

    public function getNotification()
    {
        $output = '';
        if (Auth::user()) {
            $notifications =  Notification::where('notification_to_user_id', Auth::user()->id)->orderBy('id', 'DESC')->take(7)->get();
            if ($notifications->isNotEmpty()) {
               foreach($notifications as $key => $notification) {
                    $update_notification = Notification::find($notification->id);
                    if ($update_notification->seen != 1) {
                        $update_notification->seen = 1;
                        $update_notification->save();
                    }


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
