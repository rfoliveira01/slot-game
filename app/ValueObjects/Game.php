<?php


namespace App\ValueObjects;


use App\Interfaces\GameInterface;

class Game implements GameInterface
{
    /** @var Board $board */
    private $board;

    /** @var array $paylines */
    private $possiblePayLines;

    /** @var int $betAmount */
    private $betAmount;

    public function __construct(Board $board, array $possiblePayLines, int $betAmount)
    {
        $this->board = $board;
        $this->possiblePayLines = $possiblePayLines;
        $this->betAmount = $betAmount;
    }


    public function getBetAmount(): int
    {
        return $this->betAmount;
    }

    public function getBoard(): Board
    {
        return $this->board;
    }

    public function getPossiblePayLines(): array
    {
        return $this->possiblePayLines;
    }

}