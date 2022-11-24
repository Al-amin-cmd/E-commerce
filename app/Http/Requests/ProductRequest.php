<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        if ($this->getMethod() == 'POST') {
            $rules = [

                'name' => 'required|unique:products|max:25|min:3',

                'image' => 'required',
                'category_id' => 'required',
                'info'   => 'required',
                'weight' => 'required',
                'price'  => 'required'

            ];
        }

        if ($this->getMethod() == 'PATCH') {


            $rules = [
                'name' => 'required|max:25|min:3|unique:products,name,' . $this->id,
                'image' => 'required',
                'category' => 'required',
                'info'   => 'required',
                'weight' => 'required',
                'price'  => 'required'


            ];
        }
        return $rules;
    }
}
