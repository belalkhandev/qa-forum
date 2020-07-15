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

    public function topicQuestionAnswer($question_id)
    {
        $data = [
            'page_title' => 'Topic Question',
            'page_header' => 'Topic Question',
            'question' => Question::find($question_id),
            'answers' => Answer::where('question_id', $question_id)->latest()->paginate(20),
        ];

        return view('dashboard.topic.question-answer')->with(array_merge($this->data, $data));
    }

    public function topicQuestionShow($question_id)
    {
        $data = [
            'page_title' => 'Topic Question',
            'page_header' => 'Topic Question',
            'question' => Question::find($question_id),
        ];

        return view('dashboard.topic.question-show')->with(array_merge($this->data, $data));
    }

    public function destroyQuestion(Question $question, $id)
    {
        $question = $question->find($id);

        if ($question->delete()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Question deleted Successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Question failed to delete'
        ]);
    }

    public function topicAnswer()
    {
        $data = [
            'page_title' => 'Topic Answer',
            'page_header' => 'Topic Answer',
            'answers' => Answer::latest()->paginate(20),
        ];

        return view('dashboard.topic.answer')->with(array_merge($this->data, $data));
    }

    public function destroyAnswer(Answer $answer, $id)
    {
        $answer = $answer->find($id);

        if ($answer->delete()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Answer deleted Successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Answer failed to delete'
        ]);
    }
    
}
