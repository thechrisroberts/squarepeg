<?php

namespace Squarepeg\Actions;

use Squarepeg\Exceptions\InvalidLimitException;

abstract class SquaresAction
{
    public int $limit;
    public int $power;

    public function __construct(int $limit, int $power = 2)
    {
        if ($limit < 1)
        {
            throw new InvalidLimitException();
        }

        $this->limit = $limit;
        $this->power = $power;
    }

    abstract public function handle(): int;
}
