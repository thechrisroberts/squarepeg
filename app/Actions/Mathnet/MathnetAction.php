<?php

namespace Squarepeg\Actions\Mathnet;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

abstract class MathnetAction
{
    protected array $validationRules;
    protected array $params;
    protected string $type;

    public function __construct(array $params, string $type)
    {
        $this->params = $params;
        $this->type = $type;

        $this->validate();
    }

    public function validate(): bool
    {
        $validator = Validator::make($this->params, $this->validationRules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return true;
    }

    abstract public function getParams(): array;
    abstract public function handle();
}
