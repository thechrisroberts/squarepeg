<?php

namespace Squarepeg\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SumSquaresRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'limit' => 'required|integer|min:1',
        ];
    }
}
