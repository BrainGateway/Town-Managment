<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            "name"  => 'required|string|max:200|unique:'.config('permission.table_names.permissions').',name,'.$this->route('permissions').',id',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            "name.required" => "Permission Name is required.",
            "name.max" => "Permission Name length should not greater than 200.",
        ];
    }
}
