<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Home page',
            'page_header' => 'Home page',
            'questions' => Question::orderBy('id', 'DESC')->paginate(10)
        ];

        return view('frontend.index')->with(array_merge($this->data, $data));
    }

    public function underConstruction()
    {
        $data = [
            'page_title' => 'Under Construction',
            'page_header' => 'Under Construction',
        ];

        return view('frontend.under-construction')->with(array_merge($this->data, $data));
    }

}
