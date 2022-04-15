<?php

namespace App\Services\RssItem;


use App\Interfaces\RssFeedRepositoryInterface;
use App\Interfaces\RssItemsRepositoryInterface;
use App\Interfaces\RssItemsServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;


class RssItemService implements RssItemsServiceInterface
{

    public function __construct(
        protected RssItemsRepositoryInterface $itemRepository,
        protected RssFeedRepositoryInterface $feedRepository,
    ) {
    }

    /**
     * Store feed item and associate it with feed
     * @param string $feedUrl
     * @param string $title
     * @param string $url
     * @param string $description
     * @return void
     */
    public function store(string $feedUrl, string $title, string $url, string $description) {

        $feed = $this->feedRepository->getFeedByUrlLike($feedUrl);

        if(!empty($feed)) {
            $this->itemRepository->store($feed->id, $title, $url, $description);
        }
    }

    /**
     * Getting LengthAwarePaginator paginated data
     * @param int $perPage
     * @return mixed
     */
    public function getPaginatedData(int $perPage = 5) : LengthAwarePaginator{
        return $this->itemRepository->getPaginatedData($perPage);
    }
}
