<?php

namespace Squarepeg\Actions;

class SquareSumsAction
{
    public int $limit;

    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    public function handle(): ?int
    {
        return null;
    }
}
