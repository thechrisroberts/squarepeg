<?php

namespace Squarepeg\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleSquareRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'people' => 'required|regex:/^([a-zA-Z -]+,?){1,15}$/',
        ];
    }
}
