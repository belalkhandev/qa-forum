<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Services\Utility;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Slider',
            'page_header' => 'Slider List',
            'sliders' => Slider::latest()->paginate(20),
        ];

        return view('dashboard.slider.index')->with(array_merge($this->data, $data));
    }

    public function create()
    {
        $data = [
            'page_title' => 'Add New Slider',
            'page_header' => 'Add New Slider'
        ];

        return view('dashboard.slider.create')->with(array_merge($this->data, $data));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'slider_title' => 'required',
            'slider_image' => 'required|mimes:jpg,jpeg,png',
            'status' => 'required'
        ]);

        $path = null;

        if ($request->hasFile('slider_image')) {
            $path = Utility::file_upload($request, 'slider_image', 'sliders');
        }

        $slider = new Slider();
        $slider->title = $request->get('slider_title');
        $slider->slider = $path;

        if ($slider->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Slider Stored Successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Failed to Store Slider'
        ]);
    }

    public function edit(Slider $slider, $id)
    {
        $data = [
            'page_title' => 'Update Slider',
            'page_header' => 'Update Slider',
            'slider' => $slider->findOrFail($id)
        ];

        return view('dashboard.slider.edit')->with(array_merge($this->data, $data));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'slider_title' => 'required',
            'slider_image' => 'required|mimes:jpg,jpeg,png',
            'status' => 'required'
        ]);
        
        $slider = Slider::findOrFail($id);
        $slider->title = $request->get('slider_title');

        if ($request->hasFile('slider_image')) {
            if ($slider->slider) {
                unlink($slider->slider);
            }

            $slider->slider = Utility::file_upload($request, 'slider_image', 'sliders');
        }

        $slider->status = $request->get('status');

        if ($slider->save()) {
            return response()->json([
                'type' => 'success',
                'title' => 'Updated!',
                'message' => 'Slider Updated Successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Failed to Update Slider'
        ]);
    }

    public function destroy(Slider $slider, $id)
    {
        $slider = $slider->findOrFail($id);

        //file delete
        if ($slider->slider) {
            unlink($slider->slider);
        }

        if ($slider->delete()) {

            return response()->json([
                'type' => 'success',
                'title' => 'Success!',
                'message' => 'Slider Deleted Successfully'
            ]);
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Failed to Delete Slider'
        ]);
    }
}
