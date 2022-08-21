<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlotSaleRequest extends FormRequest
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
            'plot_number'              => 'required:plot_sales,plot_number',
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
            'town_id'                  => 'required',
            'block_id'                 => '',
            'owner_plot'               => 'required',
            'nominee_owner_plot'       => 'required',
        ];
    }
}
