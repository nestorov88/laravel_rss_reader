<?php

namespace App\Providers;

use App\Services\GoRssFetcher\GoRssFetcherService;
use Illuminate\Support\ServiceProvider;

class GoRssFetcherServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(GoRssFetcherService::class, function ($app) {
            return new GoRssFetcherService(
                url: config('services.go-rss-fetcher.url'),
                port: config('services.go-rss-fetcher.port'),
            );
        });
    }

    public function boot()
    {
        //
    }
}
