<?php

namespace App\Providers;

use App\Service\BoardService;
use App\Service\GameService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GameService::class, function ($app) {
            return new GameService();
        });
        $this->app->singleton(BoardService::class, function ($app) {
            return new BoardService();
        });
    }
}
