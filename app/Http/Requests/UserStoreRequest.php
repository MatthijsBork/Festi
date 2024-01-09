<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;


class UserStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'telephone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:64'],
            'postal' => ['required', 'string', 'max:8'],
            'city' => ['required', 'string'],
            'admin' => ['nullable', 'integer'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Naam is verplicht.',
            'address.required' => 'Adres is verplicht.',
            'postal.required' => 'Postcode is verplicht.',
            'city.required' => 'Stad is verplicht.',
            'email.required' => 'E-mail is verplicht.',
            'telephone.required' => 'Telefoonnummer is verplicht.',
            'password.required' => 'Wachtwoord is verplicht',
            'password.confirmed' => 'Wachtwoorden komen niet overeen',

            'name.max' => 'Naam mag maximaal 32 tekens zijn.',
            'address.max' => 'Adres mag maximaal 48 tekens zijn.',
            'city.max' => 'Stad mag maximaal 64 tekens zijn.',
            'email.max' => 'E-mail mag maximaal 255 tekens zijn.',
            'postal.max' => 'Postcode mag niet meer dan 8 tekens zijn.',
            'telephone.max' => 'Telefoon mag maximaal 32 tekens zijn.',
            'image.max' => 'Foto mag maximaal 2MB zijn.',
            'image.mimes' => 'Foto moet JPEG, PNG, JPG, of GIF formaat zijn.',

            'email.unique' => 'Er bestaat al een account met deze E-mail.',
        ];
    }
}
