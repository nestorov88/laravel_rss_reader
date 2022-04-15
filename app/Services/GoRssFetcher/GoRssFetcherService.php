<?php

namespace App\Services\GoRssFetcher;

use App\Interfaces\RssFetcherInterface;
use App\Interfaces\RssItemsServiceInterface;
use Illuminate\Support\Facades\Http;

class GoRssFetcherService implements RssFetcherInterface
{

    public function __construct(
        protected string $url,
        protected string $port,
        protected RssItemsServiceInterface $rssItemsService,
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
        ->post("{$this->url}:{$this->port}/parse", $urls);

        $items = json_decode($response->body());

        foreach ($items->items as $item) {
            $this->rssItemsService->store($item->source_url, $item->title, $item->link, $item->description);
        }
    }
}
