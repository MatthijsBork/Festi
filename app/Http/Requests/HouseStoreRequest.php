<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'address' => 'required|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'rooms' => 'required|integer',
            'rent' => 'required|decimal:0,2',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Een adres is vereist',
            // meer messages
        ];
    }
}
