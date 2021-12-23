<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\SportRepositoryInterface;
use App\Repositories\LeagueRepositoryInterface;
use App\Repositories\LeagueRepository;
use App\Repositories\SportRepository;

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
