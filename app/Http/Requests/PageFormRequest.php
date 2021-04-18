<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageFormRequest extends FormRequest
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
            'content' => 'required',
            'title' => 'required|min:5',
            'slug' => 'required|min:5|unique:pages',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'محتوى الصفحة مطلوب',
            'slug.unique' => 'الاسم اللطيف موجود من قبل',
            'slug.required' => 'الاسم اللطيف مطلوب'
        ];
    }
}
