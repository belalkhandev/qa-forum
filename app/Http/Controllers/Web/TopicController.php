<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function newTopic()
    {
        $data = [
            'page_title' => 'New Topic',
            'page_header' => 'New Topic',
        ];

        return view('frontend.new-topic')->with(array_merge($this->data, $data));
    }

    public function storeNewTopic(Request $request)
    {
        $this->validate($request, [
            'topic_title' => 'required',
            'category' => 'required',
        ]);

        $topic = new Question();
        $topic->user_id = Auth::user()->id;
        $topic->category_id = $request->get('category');
        $topic->sub_category_id = $request->get('subcategory');
        $topic->title = $request->get('topic_title');
        $topic->description = $request->get('description');

        if ($topic->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Topic Posted!',
                'message' => 'Successfully topic post'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Registration failed'
        ]);
    }

    public function show($id)
    {
        $topic = Question::find($id);

        if (!$topic) {
            abort(404, 'Page not found');
        }
        
        if(Auth::user()) {
            if (Auth::user()->id != $topic->user_id) {
                $topic->seen = $topic->seen+1;
                $topic->save();
            }
        } else {
            $topic->seen = $topic->seen+1;
            $topic->save();
        }

        $data = [
            'page_title' => 'Show topic',
            'page_header' => 'Show Topic',
            'topic' => $topic,
            'like' => QuestionVote::where('question_id', $id)->where('like', 1)->get()->count(),
            'dislike' => QuestionVote::where('question_id', $id)->where('like', 0)->get()->count(),
        ];

        return view('frontend.show-topic')->with(array_merge($this->data, $data));

    }

    public function topicAnswer(Request $request, $id)
    {
        $this->validate($request, [
            'answer' => 'required'
        ], ['answer.required' => 'Please write your answer!']);

        //answer store
        $answer = new Answer();
        $answer->question_id = $id;
        $answer->user_id = Auth::user()->id;
        $answer->description = $request->get('answer');

        if ($answer->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Thank you',
                'message' => 'You have post an answer!',
                'redirect' => route('fr.topic.show', $id)
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Opps! Failed',
            'message' => 'Something went wrong'
        ]);
    }

    public function categoryTopic($id)
    {
         $data = [
            'page_title' => 'Category Topic',
            'page_header' => 'Category Topic',
            'questions' => Question::where('category_id', $id)->orderBy('id', 'DESC')->paginate(15)
        ];

        return view('frontend.category-topics')->with(array_merge($this->data, $data));
    
    }

    public function searchTopic(Request $request)
    {
        $value = $request->get('keyword');

        $questions = Question::whereHas('category', function ($q) use ($value) {
            $q->where('name', 'LIKE', "$value%");
        })
        ->orWhereHas('subCategory', function ($q) use ($value) {
            $q->where('name', 'LIKE', "$value%");
        })
        ->get();

         $data = [
            'page_title' => 'Search result',
            'page_header' => 'Search result',
            'questions' => $questions
        ];

        return view('frontend.search-topics')->with(array_merge($this->data, $data));
    
    }
}
