<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'product_name' => 'bail|required|unique:products|max:255|min:8',
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required',
            'description' => 'required'
        ];

    }


    public function messages()
    {
        return [
            'product_name.required' => 'Tên không được phép để trống',
            'product_name.unique' => 'Tên không được phép trùng',
            'product_name.max' => 'Tên không được phép quá 255 kí tự',
            'product_name.min' => 'Tên không được phép dưới 8 kí tự',
            'price.required' => 'Giá không được phép để trống',
            'category_id.required'  => 'Danh mục không được để trống',
            'description.required'  => 'Mô tả không được để trống',
            'contents.required'  => 'Nội dung không được để trống'
        ];
    }


}
