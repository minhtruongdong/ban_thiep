<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class CustomImageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => 'required',
            'recipient_name' => 'required|string|max:255',
            'custom_message' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Hình ảnh là bắt buộc',
            'recipient_name.required' => 'Tên người nhận là bắt buộc',
            'recipient_name.max' => 'Tên người nhận không được vượt quá 255 ký tự',
            'custom_message.required' => 'Lời chúc là bắt buộc',
        ];
    }
}