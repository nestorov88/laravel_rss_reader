<?php

namespace App\Providers;

use App\Interfaces\RssFeedRepositoryInterface;
use App\Interfaces\RssFeedServiceInterface;
use App\Interfaces\RssFetcherInterface;
use App\Repositories\RssFeedRepository;
use App\Services\GoRssFetcher\GoRssFetcherService;
use App\Services\RssUrl\RssFeedService;
use Illuminate\Pagination\Paginator;
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
        //
        $this->app->bind(RssFeedServiceInterface::class, RssFeedService::class);
        $this->app->bind(RssFeedRepositoryInterface::class, RssFeedRepository::class);
        $this->app->bind(RssFetcherInterface::class, GoRssFetcherService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
    }
}
