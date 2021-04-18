<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequestUpdate extends FormRequest
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
            'category_id' => 'required',
            'body' => 'required',
            'title' => 'required|min:5',
            'slug' => 'required',
        ];
        
    }

    public function messages()
    {
        return [
            'image.required' => 'حقل الصورة مطلوب',
            'body.required' => 'موضوع المقالة مطلوب',
            'category_id.required' => 'حقل التصنيف مطلوب',
            'slug.required' => 'حقل الاسم اللطيف مطلوب'
        ];
    }
}
