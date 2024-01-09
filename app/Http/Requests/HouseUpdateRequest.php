<?php

namespace App\Http\Requests;

use App\Models\House;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class HouseUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        dd(Auth::user()->can('hasHouse', [House::class, $this->route('house')]));
    }

    public function rules()
    {
        return [
            'address' => 'required|string',
            'postal_code' => 'required|string',
            'city' => 'required|string',
            'rooms' => 'required|integer',
            'rent' => 'required|numeric',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Een adres is vereist',

        ];
    }
}
