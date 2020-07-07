<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Carbon\Carbon;
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
            'page_title' => 'Academic Management System',
            'page_header' => 'Dashboard',
            'notices' => Notice::orderBy('publish_date', 'desc')
                ->orderBy('id', 'desc')
                ->whereDate('publish_date', '<=', Carbon::now())
                ->get()->take(15)
        ];
    }
}
