<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCompanyProfileForm extends FormRequest
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
        return [
            'company_name' => 'required',
            'founded_date' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'company_logo' => 'mimes:jpg,jpeg,png|max:1024',
            'cover_photo' => 'mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
