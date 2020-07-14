<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function topicQuestion()
    {
        $data = [
            'page_title' => 'Topic Question',
            'page_header' => 'Topic Question',
            'questions' => Question::latest()->paginate(20),
        ];

        return view('dashboard.topic.question')->with(array_merge($this->data, $data));
    }

    public function topicAnswer()
    {
        $data = [
            'page_title' => 'Topic Question',
            'page_header' => 'Topic Question',
            'answers' => Answer::latest()->paginate(20),
        ];

        return view('dashboard.topic.answer')->with(array_merge($this->data, $data));
    }
    
}
