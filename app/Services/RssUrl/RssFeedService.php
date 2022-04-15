<?php

namespace App\Services\RssUrl;

use App\Interfaces\RssFeedRepositoryInterface;
use App\Interfaces\RssFeedServiceInterface;
use App\Models\RssFeed;
use Illuminate\Pagination\LengthAwarePaginator;


class RssFeedService implements RssFeedServiceInterface
{

    private $repo;

    /**
     *
     * @param RssFeedRepositoryInterface $repository
     */
    public function __construct(RssFeedRepositoryInterface $repository) {

        $this->repo = $repository;
    }

    /**
     * Storing Rss Feed
     * @param $data
     * @return RssFeed
     */
    public function store($data) : RssFeed {

        return $this->repo->store($data['title'], $data['url']);
    }

    public function getPaginatedData(int $perPage = 5): LengthAwarePaginator {

        return $this->repo->getPaginatedData($perPage);
    }


    public function delete(int $id): bool {
        return $this->repo->delete($id);
    }
}
