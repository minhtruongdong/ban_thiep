<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'required|unique:products,name',
            'price' =>'required|numeric',
            'description' =>'required',
            'image' =>'required|mimes:jpeg,jpg,png',
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Please enter product name',
            'name.unique' => 'Product name already exists',
            'price.required' => 'Please enter price',
            'description.required' => 'Please enter product description',
            'image.required' => 'Please upload product image',
            'image.mimes' => 'Please upload jpeg,jpg,png image',            
        ];
    }
}
