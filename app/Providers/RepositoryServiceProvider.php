<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\SportRepositoryInterface;
use App\Repositories\LeagueRepositoryInterface;
use App\Repositories\TeamRepositoryInterface;
use App\Repositories\LeagueRepository;
use App\Repositories\SportRepository;
use App\Repositories\TeamRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SportRepositoryInterface::class, SportRepository::class);
        $this->app->bind(LeagueRepositoryInterface::class, LeagueRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
