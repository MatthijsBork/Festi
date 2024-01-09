<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarImageStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'images.required' => 'Voeg een foto toe',
            'images.max' => 'Foto mag maximaal 2MB zijn',
            'images.image' => 'Bestand moet een foto zijn',
            'images.mimes' => 'Foto moet een .jpeg, .png, of .jpg bestand zijn',

        ];
    }
}
