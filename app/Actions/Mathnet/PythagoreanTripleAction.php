<?php

namespace Squarepeg\Actions\Mathnet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PythagoreanTripleAction extends MathnetAction
{
    public function validate(): bool
    {
        $validator = Validator::make($this->params, [
            'a' => 'required|integer|min:1',
            'b' => 'required|integer|min:1',
            'c' => 'required|integer|between:1,100',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return true;
    }

    public function handle()
    {
        return $this->params['a'] ** 2 + $this->params['b'] ** 2 === $this->params['c'] ** 2
            ? 'true'
            : 'false';
    }

    public function getParams(): array
    {
        return [
            'a' => $this->params['a'],
            'b' => $this->params['b'],
            'c' => $this->params['c'],
        ];
    }
}
