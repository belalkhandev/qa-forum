<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Default data
     */
    protected $data = [];

    /**
     * Default Data
     * @author Belal Khan
     */
    public function __construct()
    {
        $rankings = Answer::select(DB::raw('answers.*, count(*) as answer_count'))
                        ->groupBy('user_id')
                        ->orderBy('answer_count', 'DESC')
                        ->take(10)
                        ->get();
        // Default variables
        $this->data = [
            'page_title' => 'Knowledge sharing',
            'page_header' => 'Knowledge sharing',
            'categories' => Category::orderBy('name', 'asc')->get(),
            'sliders' => Slider::latest()->take(2)->get(),
            'related_posts' => [],
            'latest_posts' => Question::latest()->take(5)->get(),
            'rankings' => $rankings,
            'new_users' => User::whereHas('roles', function($q){
                                    $q->where('name', 'user');
                                })
                                ->where('approve', 0)
                                ->where('approve_at', null)
                                ->get()
                                ->count(),
        ];

    }
}
