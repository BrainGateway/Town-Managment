<?php

namespace Modules\Entity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'string|required',
            'phone1' => 'numeric|digits_between:11,13',
            'phone2' => 'numeric|digits_between:11,13',
            'address.addr1' => 'required',
            'address.city' => 'required|string',
            'address.country' => 'required|string',
            'address.zip_code' => 'required',
            'address.lat' => 'regex:/^\d*(\.\d{1,8})?$/',
            'address.lng' => 'regex:/^\d*(\.\d{1,8})?$/',
        ];

        if(!$this->id)
        {
            $rules['company_id'] = 'required|numeric';
        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
