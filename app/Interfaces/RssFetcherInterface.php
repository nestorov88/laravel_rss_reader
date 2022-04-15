<?php

namespace App\Interfaces;

interface RssFetcherInterface
{
    public function fetchFeedItems(array $urls);
}
