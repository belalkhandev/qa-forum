<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
                $likes = QuestionVote::where('like', 1)->get()->count();
                //count negative vote
                $dislikes = QuestionVote::where('like', 0)->get()->count();

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
                //count positive vote
                $likes = QuestionVote::where('like', 1)->get()->count();
                //count negative vote
                $dislikes = QuestionVote::where('like', 0)->get()->count();

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
