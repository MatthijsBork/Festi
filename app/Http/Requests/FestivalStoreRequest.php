<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Festival;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class FestivalStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->can('isOrganizer', [User::class, Auth::user()]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'location' => 'required|string',
            'date' => 'required|date',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Een naam is verplicht',
            'email.required' => 'Een e-mail is verplicht',
            'location.required' => 'Een locatie is verplicht',
            'date.required' => 'Een datum is verplicht',
            'description.required' => 'Een beschrijving is verplicht',

            'email.email' => 'Moet een geldige e-mail zijn',
            'date.date' => 'Moet een geldige datum zijn',
        ];
    }
}
