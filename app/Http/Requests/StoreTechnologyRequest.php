<?php

namespace App\Http\Requests;

use App\Enums\PermissionEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTechnologyRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::user()->can(PermissionEnum::CanCreateProjects->value);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => ['required'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:3000']
        ];
    }
}
