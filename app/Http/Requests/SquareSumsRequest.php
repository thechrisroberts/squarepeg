<?php

namespace Squarepeg\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SquareSumsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'limit' => 'required|integer|between:1,100',
        ];
    }
}
