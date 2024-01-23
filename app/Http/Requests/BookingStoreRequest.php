<?php

namespace App\Http\Requests;

use App\Models\Festival;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class BookingStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->can('hasFestival', [Festival::class, $this->route('festival')]);
    }

    public function rules(): array
    {
        return [
            'artist' => 'required|exists:artists,id'
        ];
    }

    public function messages()
    {
        return [
            'artist.required' => 'Kies een artiest',
            'artist.exists' => 'Artiest bestaat niet'
        ];
    }
}
