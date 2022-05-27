<?php

namespace Squarepeg\Actions;

class SquareSumsPeopleAction
{
    private array $people;

    public function __construct(string $people)
    {
        $this->people = explode(',', $people);
    }

    public function handle(): string
    {
        $sumPeople = implode('', $this->people);

        return $sumPeople . $sumPeople;
    }
}
