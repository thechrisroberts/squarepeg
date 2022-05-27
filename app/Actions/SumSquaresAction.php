<?php

namespace Squarepeg\Actions;

class SumSquaresAction extends SquaresAction
{
    public function handle(): int
    {
        $sum = 0;

        for ($curN = 1; $curN <= $this->limit; $curN++) {
            $sum += ($curN ** $this->power);
        }

        return $sum;
    }
}
