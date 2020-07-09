<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployementStoreFormRequest extends FormRequest
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
        $rules =  [
            'company_name' => 'required',
            'desgination' => 'required',
            'from_date' => 'required'
        ];

        if (!$this->request->get('work_continue')) {
            $rules['to_date'] = 'required';
        }

        return $rules;
    }
}
