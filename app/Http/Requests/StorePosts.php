<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePosts extends FormRequest
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
            'title' => 'required|unique:posts|max:255',
            'content'=>['required'],
            //'image'=>['image|jpeg,png,jpg,gif,svg|max:2048'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
        'slug' => Str::slug($this->title),
    ]);
    }

    public function messages()
    {
        return [
        'title.required' => 'A title is required',
        'content.required'  => 'A message is required',
    ];
    }
}
