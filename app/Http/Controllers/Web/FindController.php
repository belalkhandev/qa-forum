<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FindController extends Controller
{
    public function getSubCategory(Request $request)
    {
        $sub_category = SubCategory::select('id', 'name')
        ->where('category_id', $request->get('category_id'))
        ->orderBy('name', 'ASC')
        ->get();

        if ($sub_category->isNotEmpty()) {
            return response()->json([
                'sub_categories' => $sub_category
            ]);
        }

        return response()->json([
            'sub_categories' => null
        ]);
    }

    public function searchCategory(Request $request)
    {
        $output = '';
        $keyword = $request->get('search_keyword');
        $categories = Category::select('name')->where('name', 'like', "$keyword%")->get()->toArray();
        $sub_categories = SubCategory::select('name')->where('name', 'like', "$keyword%")->get()->toArray();

        $all_categories = array_merge($categories, $sub_categories);

        if ($all_categories) {
            foreach($all_categories as $category) {
                $output .= '<li class="matched_item">'.$category['name'].'</li>';
            }
        } else {
            $output .= '<li>Not matched</li>';
        }

        return $output;
    }
}
