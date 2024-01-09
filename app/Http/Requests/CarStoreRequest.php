<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'brand' => 'required|exists:brands,id',
            'mileage' => 'required|max:7',
            'price' => 'required|integer',
            'year' => 'required|max:4',
            'plate' => 'required|max:12',
            'mot' => 'required|date',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Een titel is vereist',
            'brand.required' => 'Een merk is vereist',
            'mileage.required' => 'Een kilometerstand is vereist',
            'year.required' => 'Een bouwjaar is vereist',
            'plate.required' => 'Een kenteken is vereist',
            'mot.required' => 'Een laatste APK is vereist',
            'description.required' => 'Een beschrijving is vereist',

            'brand.exists' => 'Dit merk bestaat niet in ons systeem',
            'mileage.max' => 'Kilometerstand te hoog',
            'year.max' => 'Bouwjaar moet in dit millenium vallen',
            'plate.max' => 'Kenteken kan niet langer dan 12 tekens zijn',
        ];
    }
}
