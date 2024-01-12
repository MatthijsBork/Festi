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
            //
        ];
    }
}
