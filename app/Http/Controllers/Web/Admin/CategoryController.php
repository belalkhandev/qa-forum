<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Category',
            'page_header' => 'Category List',
            'categories' => Category::get(),
        ];

        return view('dashboard.category.index')->with(array_merge($this->data, $data));
    }

    public function create()
    {
        $data = [
            'page_title' => 'Create Category',
            'page_header' => 'Create Category'
        ];

        return view('dashboard.category.create')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'status' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->get('name');
        $category->status = $request->get('status');

        if ($category->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Category Created Successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Failed to Create Category'
        ]);
    }

    public function edit($id)
    {
        $data = [
            'page_title' => 'Update Category',
            'page_header' => 'Update Category',
            'category' => Category::findOrFail($id)
        ];

        return view('dashboard.category.edit')->with(array_merge($this->data, $data));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id,
            'status' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
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
        $category = Category::findOrFail($id);

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
