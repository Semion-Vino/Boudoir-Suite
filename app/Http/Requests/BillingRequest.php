<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillingRequest extends FormRequest
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

    public function rules()
    {
        return [
            'firstName' => 'required|min:2|max:70',
            'lastName' => 'required|min:2|max:70',
            'street' => 'required|min:2|max:70',
            'apartment' => 'required|min:1|max:70',
            'country' => 'required',
            'city' => 'required|min:2|max:70',
            'zip' => 'required|numeric',
            'phone' => 'required|numeric',
            'payment' => 'required',

        ];
    }
}
