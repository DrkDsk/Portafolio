<?php

namespace App\Http\Requests;

use App\Enums\PermissionEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->can(PermissionEnum::CanCreateProjects->value);
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'description' => ['required','string'],
            'creation_year' => ['required','integer'],
            'creation_month' => ['required','integer'],
            'technologies'   => ['required'],
            'type' => ['required'],
            'images' => ['nullable','array'],
            'images.*' => ['nullable','image','mimes:jpeg,png,jpg','max:3000'],
            'cover' => ['required','image','mimes:jpeg,png,jpg','max:3000']
        ];
    }
}
