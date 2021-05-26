<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_value' => 'required|unique:settings',
            'config_key' => 'required|unique:settings',
        ];

    }

    public function messages()
    {
        return [
            'config_value.required' => 'Tên không được phép để trống',
            'config_value.unique' => 'Tên không được phép trùng nhau',
            'config_key.required' => 'Tên không được phép để trống',
            'config_key.unique' => 'Tên không được phép trùng nhau',
        ];
    }
}
