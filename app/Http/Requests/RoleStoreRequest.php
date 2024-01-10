<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:16|unique:roles,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vul een naam in',
            'name.max' => 'Naam mag maximaal 16 tekens zijn',
            'name.unique' => 'Naam bestaat al',
        ];
    }
}
