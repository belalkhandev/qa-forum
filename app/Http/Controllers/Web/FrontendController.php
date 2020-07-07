<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'School',
            'page_header' => 'School',
        ];

        return view('frontend.index')->with(array_merge($this->data, $data));
    }

    public function about()
    {
        $data = [
            'page_title' => 'About US',
            'page_header' => 'About US',
            'notices' => Notice::orderBy('publish_date', 'desc')
                                ->orderBy('id', 'desc')
                                ->whereDate('publish_date', '<=', Carbon::now())
                                ->get()->take(15)
        ];

        return view('frontend.about')->with(array_merge($this->data, $data));
    }

    public function noticeList()
    {
        $data = [
            'page_title' => 'All Notices',
            'page_header' => 'Notices',
            'all_notices' => Notice::orderBy('publish_date', 'desc')
                ->orderBy('id', 'desc')
                ->whereDate('publish_date', '<=', Carbon::now())
                ->paginate(5)
        ];

        return view('frontend.notice.index')->with(array_merge($this->data, $data));
    }

    public function showNotice(Notice $notice, $id)
    {
        $data = [
            'page_title' => 'Show Notice',
            'page_header' => 'Show Notice',
            'single_notice' => Notice::findOrFail($id)
        ];

        return view('frontend.notice.show')->with(array_merge($this->data, $data));
    }

    public function uncerConstruction()
    {
        $data = [
            'page_title' => 'Under Construction',
            'page_header' => 'Under Construction',
            'notices' => Notice::orderBy('publish_date', 'desc')
                                ->orderBy('id', 'desc')
                                ->whereDate('publish_date', '<=', Carbon::now())
                                ->get()->take(15)
        ];

        return view('frontend.underconstruction')->with(array_merge($this->data, $data));
    }
}
