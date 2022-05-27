<?php

namespace Squarepeg\Actions\Mathnet;

abstract class MathnetAction
{
    protected array $params;
    protected string $type;

    public function __construct(array $params, string $type)
    {
        $this->params = $params;
        $this->type = $type;

        $this->validate();
    }

    abstract public function getParams(): array;
    abstract public function validate(): bool;
    abstract public function handle();
}
