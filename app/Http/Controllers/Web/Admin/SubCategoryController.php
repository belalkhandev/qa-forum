<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Category',
            'page_header' => 'Category List',
            'categories' => SubCategory::get(),
        ];

        return view('dashboard.sub-category.index')->with(array_merge($this->data, $data));
    }

    public function create()
    {
        $data = [
            'page_title' => 'Create Sub Category',
            'page_header' => 'Create Sub Category',
            'categories' => Category::orderBy('name', 'ASC')->get(),
        ];

        return view('dashboard.sub-category.create')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:sub_categories,name',
            'category' => 'required',
            'status' => 'required'
        ]);

        $category = new SubCategory();
        $category->name = $request->get('name');
        $category->category_id = $request->get('category');
        $category->status = $request->get('status');

        if ($category->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Sub Category Created Successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Failed to Create Sub Category'
        ]);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'Update Sub Category',
            'page_header' => 'Update SubCategory',
            'category' => SubCategory::findOrFail($id),
            'categories' => Category::orderBy('name', 'ASC')->get(),
        ];

        return view('dashboard.sub-category.edit')->with(array_merge($this->data, $data));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:sub_categories,name,'.$id,
            'category' => 'required',
            'status' => 'required'
        ]);

        $category = SubCategory::findOrFail($id);
        $category->name = $request->get('name');
        $category->category_id = $request->get('category');
        $category->status = $request->get('status');

        if ($category->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Updated!',
                'message' => 'Category Updated Successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Failed to Update Category'
        ]);
    }

    public function destroy($id)
    {
        $category = SubCategory::findOrFail($id);

        if ($category->delete()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Category Deleted Successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Category to Delete Skill'
        ]);
    }
}
