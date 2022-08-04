<?php

namespace Modules\Notifier\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailNotificationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'required',
            'html_body' => 'required',
            'text_body' => 'required',
            'hook' => 'required',
        ];
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
