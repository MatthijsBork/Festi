<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseImageStoreRequest extends FormRequest
{
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
