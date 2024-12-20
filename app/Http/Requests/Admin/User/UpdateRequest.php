<?php

namespace App\Http\Requests\Admin\User;

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
            // 'email' => 'required|email|unique:users,email,' .$this->id,
            'full_name' => 'required',
            'phone' => 'required|digits:10',
        ];
    }

    public function messages(): array
    {
        return[
            'email.required' => 'Please enter email address',
            'email.unique' => 'Email is exist. Please choose a different',
            'email.email' => 'Please enter valid email address',

            'password.min' => 'Password must be at least 8 chars',
            'full_name.required' => 'Please enter a full name',
            'phone.required' => 'Please enter a phone number',
        ];
    }
}
