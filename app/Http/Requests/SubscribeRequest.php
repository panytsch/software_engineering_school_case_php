<?php

namespace App\Http\Requests;

use App\Rules\SubscriberExists;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class SubscribeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', new SubscriberExists()],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json(null, Response::HTTP_CONFLICT);

        throw new ValidationException($validator, $response);
    }


}
