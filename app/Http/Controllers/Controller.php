<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
        // Default variables
        $this->data = [
            'page_title' => 'Knowledge sharing',
            'page_header' => 'Knowledge sharing',
            'categories' => Category::orderBy('name', 'asc')->get(),
            'sliders' => Slider::latest()->take(2)->get()
        ];
    }
}
