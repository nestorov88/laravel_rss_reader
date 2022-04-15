<?php

namespace App\Repositories;

use App\Interfaces\RssItemsRepositoryInterface;
use App\Models\RssFeedItem;
use Illuminate\Support\Facades\DB;

class RssItemRepository implements RssItemsRepositoryInterface
{

    public function store(int $feedId, string $title, string $url, string $description) {
        $item = new RssFeedItem();
        $item->feed_id = $feedId;
        $item->title = $title;
        $item->url = $url;
        $item->description = $description;
        $item->save();
    }

    public function getPaginatedData(int $perPage = 5) {
        return DB::table('rss_feed_items')->paginate($perPage);
    }
}
