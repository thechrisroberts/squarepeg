<?php

namespace Squarepeg\Actions;

use Squarepeg\Exceptions\InvalidLimitException;

class DiffSquaresAction extends SquareSumsAction
{
    public function handle(): int
    {
        return (new SquareSumsAction($this->limit, $this->power))->handle()
        - (new SumSquaresAction($this->limit, $this->power))->handle();
    }
}
