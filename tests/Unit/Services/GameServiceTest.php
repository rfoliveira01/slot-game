<?php
namespace Unit\Services;


use App\Service\BoardService;
use App\Service\GameService;
use App\ValueObjects\Board;
use App\ValueObjects\Game;

class GameServiceTest extends \TestCase
{

    /**
     * @var GameService
     */
    private $gameService;

    /**
     * @var BoardService
     */
    private $boardService;


    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->gameService = new GameService();
        $this->boardService = new BoardService();

    }


    public function test_if_build_returns_a_game_instance()
    {
        $board = $this->boardService->build();
        $this->assertInstanceOf(Game::class, $this->gameService->buildGame($board));
    }

    public function test_game_values()
    {
        $board = $this->boardService->build();
        $game =  $this->gameService->buildGame($board);
        $this->assertIsInt( $game->getBetAmount());
        $this->assertInstanceOf(Board::class, $game->getBoard());
        $this->assertCount(5, $game->getPossiblePayLines());
    }
    public function test_game_result_values()
    {
        $board = $this->boardService->build();
        $game =  $this->gameService->buildGame($board);
        $game_result = $this->gameService->play($game);
        $this->assertIsArray($game_result);
        $this->assertArrayHasKey("board",$game_result);
        $this->assertArrayHasKey("paylines",$game_result);
        $this->assertArrayHasKey("bet_amount",$game_result);
        $this->assertArrayHasKey("total_win",$game_result);
    }
}
