<?php

namespace Squarepeg\Actions;

class SumSquaresPeopleAction
{
    private array $people;

    public function __construct(string $people)
    {
        $this->people = explode(',', $people);
    }

    public function handle(): string
    {
        array_walk($this->people, fn($name, $ind) => $this->people[$ind] = $name . $name);
        $squarePeople = implode($this->people);

        return $squarePeople;
    }
}
