<?php
namespace Unit\ValueObjects;

use App\Interfaces\BoardInterface;
use App\ValueObjects\Board;

class BoardTest extends \TestCase
{
    public function test_if_implements_board_interface()
    {
        $board = \Mockery::mock(Board::class, [[]]);
        $this->assertInstanceOf(BoardInterface::class, $board);
    }
}
