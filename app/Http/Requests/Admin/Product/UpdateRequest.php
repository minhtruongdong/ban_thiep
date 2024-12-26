<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' =>'required|unique:products,name,' .$this->id,
            'price' =>'required|numeric',
            'description' =>'required',
            
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Please enter product name',
            'name.unique' => 'Product name already exists',
            'price.required' => 'Please enter number',
            'description.required' => 'Please enter product description',
                        
        ];
    }
}
