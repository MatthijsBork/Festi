<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:16',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vul een naam in',
            'name.max' => 'Naam mag maximaal 16 tekens zijn',
        ];
    }
}
