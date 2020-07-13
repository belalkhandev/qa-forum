<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AnswerVote;
use App\Models\Notification;
use App\Models\QuestionVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function topicVote(Request $request)
    {
        //auth check
        if (Auth::check())
        {
            $user_id = Auth::user()->id;
            
            //exists vote checking
            $exists = QuestionVote::where('user_id', $user_id)->where('question_id', $request->get('topic_id'))->first();

            if ($exists) {
                if ($request->get('vote') == $exists->like) {
                    $exists->delete();
                }

                //count positive vote
                $likes = QuestionVote::where('question_id', $request->get('topic_id'))->where('like', 1)->get()->count();
                //count negative vote
                $dislikes = QuestionVote::where('question_id', $request->get('topic_id'))->where('like', 0)->get()->count();

                return response()->json([
                    'statusCode' => 409,
                    'message' => 'You have already voted this topic',
                    'data' => [
                        'likes' => $likes,
                        'dislikes' => $dislikes
                    ]
                ]); 
            }

            $vote = new QuestionVote();
            $vote->question_id = $request->get('topic_id');
            $vote->user_id = $user_id;
            $vote->like = $request->get('vote');

            if ($vote->save()) {
                if ($user_id != $vote->question->user_id) {
                    //notification for question
                    $title = 'React your question';
                    //check exits notification
                    $n_exists = Notification::where('notification_from_user_id', $user_id)
                    ->where('notification_to_user_id', $vote->question->user_id)
                    ->where('notification_for_id', $vote->question_id)
                    ->where('notification_for', 'question')
                    ->where('notification_title', $title)
                    ->first();

                    if (!$n_exists) {
                        $notification = new Notification();
                        $notification->notification_from_user_id = $user_id;
                        $notification->notification_to_user_id = $vote->question->user_id;
                        $notification->notification_for = 'question';
                        $notification->notification_for_id = $vote->question_id;
                        $notification->notification_title = $title;
                        $notification->save();
                    }
                }
                
                //count positive vote
                $likes = QuestionVote::where('question_id', $request->get('topic_id'))->where('like', 1)->get()->count();
                //count negative vote
                $dislikes = QuestionVote::where('question_id', $request->get('topic_id'))->where('like', 0)->get()->count();

                return response()->json([
                    'statusCode' => 200,
                    'message' => 'Thanks you for your vote',
                    'data' => [
                        'likes' => $likes,
                        'dislikes' => $dislikes
                    ]
                ]);

                return response()->json([
                    'statusCode' => 301,
                    'message' => 'Something went wrong',
                ]);
            }
            
        } else {
            return response()->json([
                'statusCode' => 401,
                'message' => 'Unauthorized access, please sign in' 
            ]);
        }
    } 
    
    public function answerVote(Request $request)
    {
        //auth check
        if (Auth::check())
        {
            $user_id = Auth::user()->id;
            
            //exists vote checking
            $exists = AnswerVote::where('user_id', $user_id)->where('answer_id', $request->get('answer_id'))->first();

            if ($exists) {
                if ($request->get('vote') == $exists->like) {
                    $exists->delete(); 
                }

                //count positive vote
                $likes = AnswerVote::where('answer_id', $request->get('answer_id'))->where('like', 1)->get()->count();
                //count negative vote
                $dislikes = AnswerVote::where('answer_id', $request->get('answer_id'))->where('like', 0)->get()->count();

                return response()->json([
                    'statusCode' => 409,
                    'message' => 'You have already voted this topic',
                    'data' => [
                        'likes' => $likes,
                        'dislikes' => $dislikes
                    ]
                ]); 
            }

            $vote = new AnswerVote();
            $vote->answer_id = $request->get('answer_id');
            $vote->user_id = $user_id;
            $vote->like = $request->get('vote');

            if ($vote->save()) {
                if ($user_id != $vote->answer->user_id) {
                    //notification for question
                    $title = 'React your answer';
                    //check exits notification
                    $n_exists = Notification::where('notification_from_user_id', $user_id)
                    ->where('notification_to_user_id', $vote->answer->user_id)
                    ->where('notification_for_id', $vote->answer->question_id)
                    ->where('notification_for', 'answer')
                    ->where('notification_title', $title)
                    ->first();

                    if (!$n_exists) {
                        $notification = new Notification();
                        $notification->notification_from_user_id = $user_id;
                        $notification->notification_to_user_id = $vote->answer->user_id;
                        $notification->notification_for = 'answer';
                        $notification->notification_for_id = $vote->answer->question_id;
                        $notification->notification_title = $title;
                        $notification->save();
                    }
                }
                //count positive vote
                $likes = AnswerVote::where('answer_id', $request->get('answer_id'))->where('like', 1)->get()->count();
                //count negative vote
                $dislikes = AnswerVote::where('answer_id', $request->get('answer_id'))->where('like', 0)->get()->count();

                return response()->json([
                    'statusCode' => 200,
                    'message' => 'Thanks you for your vote',
                    'data' => [
                        'likes' => $likes,
                        'dislikes' => $dislikes
                    ]
                ]);

                return response()->json([
                    'statusCode' => 301,
                    'message' => 'Something went wrong',
                ]);
            }
            
        } else {
            return response()->json([
                'statusCode' => 401,
                'message' => 'Unauthorized access, please sign in' 
            ]);
        }
    } 
}
