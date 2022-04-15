<?php

namespace App\Providers;

use App\Interfaces\RssItemsRepositoryInterface;
use App\Services\GoRssFetcher\GoRssFetcherService;
use App\Services\RssItem\RssItemService;
use Illuminate\Support\ServiceProvider;

class GoRssFetcherServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(GoRssFetcherService::class, function ($app) {
            return new GoRssFetcherService(
                url: config('services.go-rss-fetcher.url'),
                port: config('services.go-rss-fetcher.port'),
                rssItemsService: resolve(RssItemService::class,[RssItemsRepositoryInterface::class])
            );
        });
    }

    public function boot()
    {
        //
    }
}
