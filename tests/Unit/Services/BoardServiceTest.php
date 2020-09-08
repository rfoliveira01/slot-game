<?php
namespace Unit\Services;


use App\Service\BoardService;
use App\ValueObjects\Board;

class BoardServiceTest extends \TestCase
{

    /**
     * @var BoardService
     */
    private $boardService;


    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->boardService = new BoardService();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_if_build_returns_a_board_instance()
    {
        $this->assertInstanceOf(Board::class, $this->boardService->build());
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_board_values()
    {
        $board =  $this->boardService->build();
        $this->assertIsArray($board->getBoardValues());
        $this->assertCount(15, $board->getBoardValues());
    }
}
