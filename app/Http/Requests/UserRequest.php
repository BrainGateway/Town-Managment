<?php

namespace App\Http\Requests;

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
        $validationArray = [
            "first_name"         => 'required',
            "last_name"         => 'required',
            "user_email"        => 'required|email|max:200|unique:town_users,email,'.$this->route('user').',id',
            "user_role"         => 'required|array|max:500',

        ];
        if ($this->isMethod('POST')) {
            $validationArray["password"] = "required|string|min:8|confirmed";
        }
        return $validationArray;
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            "first_name.required" => "The First Name is required.",
            "first_name.max" => "The first Name length should not greater than 200.",
            "last_name.required" => "The last Name is required.",
            "last_name.max" => "The last Name length should not greater than 200.",
            "user_email.required" => "The User Email is required.",
            "user_email.email" => "The User Email format is not valid.",
            "user_email.max" => "The User Email length should not greater than 200.",
            "user_role.required" => "The User Role is required.",
            "user_role.max" => "User Role length should not greater than 100.",
        ];
    }
}
