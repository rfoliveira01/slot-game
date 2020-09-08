<?php


namespace App\Service;

use App\ValueObjects\Board;

class BoardService
{
    public function __construct()
    {
        //Seeding the rand function;
        srand(round(microtime(true) * 1000));
    }

    public function build(): Board
    {
        $boardValues = [];
        foreach (Board::BOARD_SETUP as $line) {
            $boardLine = [];
            foreach ($line as $position) {
                $boardLine[$position] = $this->generateRandomValue();
            }
            $boardValues += $boardLine;
        }
        return new Board($boardValues);
    }

    private function generateRandomValue(): string
    {
        $rand_position = array_rand(Board::POSSIBLE_VALUES);
        return Board::POSSIBLE_VALUES[$rand_position];
    }
}