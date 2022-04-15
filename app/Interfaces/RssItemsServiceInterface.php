<?php

namespace App\Interfaces;

interface RssItemsServiceInterface
{
    public function store(string $feedUrl, string $title, string $url, string $description);
}
