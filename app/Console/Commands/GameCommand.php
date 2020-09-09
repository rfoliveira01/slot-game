<?php

namespace App\Console\Commands;

use App\Service\BoardService;
use App\Service\GameService;
use App\ValueObjects\Board;
use Illuminate\Console\Command;

class GameCommand extends Command
{


    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "game:play";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Start a new game";

    /** @var BoardService */
    private $boardService;

    /** @var GameService */
    private $gameService;

    public function __construct(BoardService $boardService, GameService $gameService)
    {
        parent::__construct();
        $this->boardService = $boardService;
        $this->gameService = $gameService;
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $board = $this->boardService->build();
            $game = $this->gameService->buildGame($board);

            $result = $this->gameService->play($game);

            $this->info(json_encode($result, JSON_PRETTY_PRINT));

        } catch (\Exception $e) {
            $this->error($e->getTraceAsString());
        }
    }


}
