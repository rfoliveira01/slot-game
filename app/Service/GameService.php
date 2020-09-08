<?php


namespace App\Service;

use App\ValueObjects\Board;
use App\ValueObjects\Game;

class GameService
{
    public function buildGame(Board $board): Game
    {
        return new Game($board, $this->buildPossiblePayLines($board), Game::DEFAULT_BET_VALUE);
    }

    private function buildPossiblePayLines(Board $board): array
    {
        $possiblePayLines = [];
        $boardValues = $board->getBoardValues();
        foreach (Game::PAY_LINES as $payLinePositions) {
            $payLine = [];
            $index = implode(" ", $payLinePositions);
            foreach ($payLinePositions as $payLinePosition) {
                $payLine[] = $boardValues[$payLinePosition];
            }
            $possiblePayLines[$index] = $payLine;
        }
        return $possiblePayLines;
    }

    private function checkSequence(array $payLine)
    {
        $sequence = 0;
        foreach ($payLine as $index => $value) {
            if ($index > 0 && $payLine[$index - 1] != $value) {
                break;
            }
            $sequence++;
        }
        return $sequence;
    }

    private function getPayLines(Game $game): array
    {
        $payLines = [];
        foreach ($game->getPossiblePayLines() as $index => $values) {
            $sequence = $this->checkSequence($values);
            if ($sequence >= 3) {
                $payLines[$index] = $sequence;
            }
        }
        return $payLines;
    }

    private function calculatePayLineValue(int $sequence, int $betValue)
    {
        if(array_key_exists($sequence, Game::PAY_VALUES)){
            return Game::PAY_VALUES[$sequence] * $betValue;
        }
        return 0;
    }

    public function play(Game $game){
        $result = [];

        $result['board'] = "[".implode(", ",$game->getBoard()->getBoardValues())."]";
        $result['bet_amount'] = $game->getBetAmount();
        $result['paylines'] = $this->getPayLines($game);
        $totalWin = 0;
        foreach ($result['paylines'] as $sequence){
            $totalWin+=$this->calculatePayLineValue($sequence,$game->getBetAmount());
        }
        $result['total_win'] = $totalWin;

        return $result;
    }

}