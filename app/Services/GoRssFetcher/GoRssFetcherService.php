<?php

namespace App\Services\GoRssFetcher;

use App\Interfaces\RssFetcherInterface;
use Illuminate\Support\Facades\Http;

class GoRssFetcherService implements RssFetcherInterface
{

    public function __construct(
        protected string $url,
        protected string $port,
    ) {}

    /**
     * Fetching RSS Feed items from given array of URLs and
     * @param array $urls
     * @return void
     */
    public function fetchFeedItems(array $urls) {

        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])
        ->post("{$this->url}:{$this->port}", $urls);

    }
}
