<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $property = $this->route('property');

        return [
            'name' => 'required|string|max:32|unique:properties,name,' . $property->id,
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
