<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:APP_USER',
            'username' => 'required|string|max:50',
            'password' => 'required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'email may not be null',
            'username.required' => 'username may not be null',
            'password.required' => 'password may not be null',
            'password.same' => 'password and confirm password must be match'
        ];
    }
}
