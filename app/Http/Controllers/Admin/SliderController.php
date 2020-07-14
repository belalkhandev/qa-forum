<?php

namespace App\Http\Controllers\Admin;

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
            'sliders' => Slider::paginate(20),
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
        $path = null;

        if ($request->hasFile('slide_img')) {
            $path = Utility::file_upload($request, 'slide_img', 'sliders');
        }

        $slider = new Slider();
        $slider->title = $request->get('title');
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
        $slider = Slider::findOrFail($id);
        $slider->title = $request->get('title');

        if ($request->hasFile('slide_img')) {
            if ($slider->slider) {
                unlink($slider->slider);
            }

            $slider->slider = Utility::file_upload($request, 'slide_img', 'sliders');
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
        if ($slider->slide_photo) {
            unlink($slider->slide_photo);
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
