<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlotSaleRequest extends FormRequest
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
            'plot_number'              => 'required|unique:plot_sales,plot_number',
            'size'                     => 'required',
            'dimension'                => 'required',
            'form_number'              => 'required',
            'plot_price'               => 'required',
            'discount'                 => 'required',
            'registration_charges'     => 'required',
            'deal_price'               => 'required',
            'installments'             => 'required',
            'deal_validity'            => 'required',
            'sale_man'                 => 'required',
            'mmd'                      => '',
            'register_only'            => '',

            'owner_name'                => 'required',
            'owner_father_name'         => 'required',
            'owner_address'             => 'required',
            'owner_phone_number'        => 'required',
            'owner_cnic'                => 'required',
            'owner_email'               => 'required',
            'owner_password'            => 'required',
            'owner_profile_img'         => '',
            'owner_cnic_front_img'      => '',
            'owner_cnic_back_img'       => '',

            'nominee_name'                => 'required',
            'nominee_father_name'         => 'required',
            'nominee_address'             => 'required',
            'nominee_phone_number'        => 'required',
            'nominee_cnic'                => 'required',
            'nominee_email'               => 'required',
            'nominee_password'            => 'required',
            'nominee_profile_img'         => '',
            'nominee_cnic_front_img'      => '',
            'nominee_cnic_back_img'       => '',

        ];
    }
}




