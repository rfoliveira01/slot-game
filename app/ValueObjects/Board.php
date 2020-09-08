<?php


namespace App\ValueObjects;


use App\Interfaces\BoardInterface;

class Board implements BoardInterface
{
    /** @var array $boardValues */
    private $boardValues;

    public function __construct($boardValues)
    {
        $this->boardValues = $boardValues;
    }

    public function getBoardValues(): array
    {
        return $this->boardValues;
    }

}