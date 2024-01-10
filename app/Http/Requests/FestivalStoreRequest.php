<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Festival;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class FestivalStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->can('isOrganizer', Festival::class);
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
