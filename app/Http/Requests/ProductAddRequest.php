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
            'name' => 'bail|required|max:255|min:3',
            'price' => 'required',
            'capacity' => 'required',
            'alcohol_concentration' => 'required',
            'tags' => 'required',
            'contents' => 'required',
            'category_id' => 'required',
            'feature_image_path' => 'required|image',
            'image_path' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được phép để trống',
            'name.max' => 'Tên không được phép quá 255 kí tự',
            'name.min' => 'Tên không được phép dưới 3 kí tự',
            'price.required' => 'Giá không được phép để trống',
            'capacity.required' => 'Dung tích không được phép để trống',
            'alcohol_concentration.required' => 'Nồng độ không được phép để trống',
            'tags.required' => 'Tag không được phép để trống',
            'contents.required' => ' Nội dung được phép để trống',
            'category_id.required' => 'Danh mục không được phép để trống',
            'feature_image_path.required' => 'Ảnh đại diện không được phép để trống',
            'feature_image_path.image' => 'Tệp được xác định phải là hình ảnh',
            'image_path.required' => 'Ảnh chi tiết không được phép để trống',
        ];
    }
}
