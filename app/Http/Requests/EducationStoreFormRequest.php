<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationStoreFormRequest extends FormRequest
{   
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'education_level' => 'required',
            'exam_title' => 'required',
            'group' => 'required',
            'institute_name' => 'required',
            'result_type' => 'required',
            'cgpa' => 'required',
            'scale' => 'required',
            'pass_year' => 'required',
        ];

        return $rules;
    }
}
