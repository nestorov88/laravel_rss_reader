<?php

namespace App\Repositories;

use App\Interfaces\RssFeedRepositoryInterface;
use App\Models\RssFeed;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;


class RssFeedRepository implements RssFeedRepositoryInterface
{

    /**
     * Using eloquent ORM to store RssFeed to DB
     * @param string $title
     * @param string $url
     * @return RssFeed
     */
    public function store(string $title, string $url) : RssFeed {
        $rssFeed = new RssFeed();

        $rssFeed->title = $title;
        $rssFeed->url = $url;

        $rssFeed->save();

        return $rssFeed;
    }

    /**
     * Return pagination result for RssFeed to be used in view
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedData(int $perPage = 5) : LengthAwarePaginator {
        return DB::table('rss_feeds')->paginate($perPage);
    }

    /**
     * @throws \Exception
     */
    public function delete(int $id): bool {
        $feed = RssFeed::find($id);

        if(empty($feed)) throw new \Exception("Feed not found.");

        return $feed->delete();
    }

    public function getFeedByUrlLike(string $url) {
        return RssFeed::where('url', 'LIKE', "%{$url}%")->first();
    }
}
