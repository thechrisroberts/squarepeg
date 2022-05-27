<?php

namespace Squarepeg\Actions;

use Squarepeg\Exceptions\InvalidLimitException;

class SumSquaresAction
{
    public int $limit;

    public function __construct(int $limit)
    {
        if ($limit < 1)
        {
            throw new InvalidLimitException();
        }

        $this->limit = $limit;
    }

    public function handle(): ?int
    {
        return null;
    }
}
