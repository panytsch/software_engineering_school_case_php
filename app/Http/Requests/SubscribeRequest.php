<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'email address',
        ];
    }

    public function getEmail(): string
    {
        return $this->validated('email');
    }
}
