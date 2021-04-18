<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingFormRequest extends FormRequest
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
            'email' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
        ];
        
    }

    public function messages()
    {
        return [
            'email.required' => 'حقل البريد الالكتروني مطلوب',
            'facebook.required' => 'حقل الفايسبوك مطلوب',
            'twitter.required' => 'حقل التويتر مطلوب',
            'instagram.required' => 'حقل الانستغرام مطلوب',
            'linkedin.required' => 'حقل لينكدان مطلوب',
        
        ];
    }
}
