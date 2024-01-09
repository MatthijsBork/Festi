<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:32|unique:brands,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Het naam veld is verplicht.',
            'name.max' => 'Naam mag maximaal 32 tekens lang zijn',
            'name.unique' => 'Een eigenschap met deze naam bestaat al',
        ];
    }
}
