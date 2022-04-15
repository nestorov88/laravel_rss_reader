<?php

namespace App\Providers;

use App\Interfaces\RssFeedRepositoryInterface;
use App\Interfaces\RssFeedServiceInterface;
use App\Interfaces\RssFetcherInterface;
use App\Interfaces\RssItemsRepositoryInterface;
use App\Interfaces\RssItemsServiceInterface;
use App\Repositories\RssFeedRepository;
use App\Repositories\RssItemRepository;
use App\Services\GoRssFetcher\GoRssFetcherService;
use App\Services\RssFeed\RssFeedService;
use App\Services\RssItem\RssItemService;
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
        $this->app->bind(RssItemsServiceInterface::class, RssItemService::class);
        $this->app->bind(RssItemsRepositoryInterface::class, RssItemRepository::class);
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
