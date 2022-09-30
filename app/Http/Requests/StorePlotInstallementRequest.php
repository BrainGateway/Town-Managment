<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlotInstallementRequest extends FormRequest
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
            'number_of_plot'        => 'required',
            'owner_plot'            => 'required',
            'payment_type'          => 'required',
            'deposit_amount'        => 'required',
            'deposit_slip'          => 'required',
            'auto_slip_number'      => 'required',
            'payment_method'        => 'required',
            'town_id'               => '',
        ];
    }
}

