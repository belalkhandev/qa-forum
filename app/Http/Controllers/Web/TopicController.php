<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

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
}
