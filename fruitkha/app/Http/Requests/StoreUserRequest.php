<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            "firstName" => "required|string|regex:/\p{L}[\p{L}\s]+/u",
            "lastName" => "required|string|regex:/\p{L}[\p{L}\s]+/u",
            "email" => "required|email|unique:user,email",
            "password" => [
                "required",
                "string",
                "min:8",
                "regex:/\p{Lu}/u",
                "regex:/\p{Ll}/u",
                "regex:/\d/"
            ],
        ];
    }

    public function messages()
    {
        return [
            "firstName.required" => "First name is required",
            "firstName.regex"=> "First name must contain only letters (and spaces if needed)",
            "lastName.required" => "Last name is required",
            "lastName.regex"=> "Last name must contain only letters (and spaces if needed)",
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
            "password.min" => "Password must be at least 6 characters long",
            "password.regex" => "Password must contain at least one uppercase letter, one lowercase letter and one digit",
        ];
    }
}
