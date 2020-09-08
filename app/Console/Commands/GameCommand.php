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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $boardBuilder = new BoardService();
            $gameService = new GameService();
            $board = $boardBuilder->build();
            $game = $gameService->buildGame($board);

            $result = $gameService->play($game);

            $this->info(json_encode($result, JSON_PRETTY_PRINT));

        } catch (\Exception $e) {
            $this->error($e->getTraceAsString());
        }
    }


}
