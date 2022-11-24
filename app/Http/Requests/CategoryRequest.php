<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
     public function rules()
    {
            $imageValidationRules = 'image|mimes:jpg,png,jpeg,gif';

            if ($this->isMethod('post')) {
                $imageValidationRules = 'required|' . $imageValidationRules;
            }

            return [
                'name' => 'required|min:2|max:20|unique:categories,name,'.$this->id,
                'details' => 'required',
                // 'image' => 'required|image|mimes:jpg,png,jpeg,gif'
                 'image' => $imageValidationRules
            ];
        }

        public function messages()
        {
            return [
                'name.required' => 'Name requred',
                'details.required' => 'Details requred',
                // 'image.required' => 'Image requred',
            ];
        }
}