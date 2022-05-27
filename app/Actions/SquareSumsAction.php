<?php

namespace Squarepeg\Actions;

use Squarepeg\Exceptions\InvalidLimitException;

class SquareSumsAction extends SquaresAction
{
    public function __construct(int $limit, int $power = 2)
    {
        if ($limit > 100)
        {
            throw new InvalidLimitException();
        }

        parent::__construct($limit, $power);
    }

    public function handle(): int
    {
        $sum = 0;

        for ($curN = 1; $curN <= $this->limit; $curN++) {
            $sum += $curN;
        }

        return $sum ** $this->power;
    }
}
