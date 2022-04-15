<?php

namespace App\Interfaces;

interface RssItemsRepositoryInterface
{
    public function store(int $feedId, string $title, string $url, string $description);

    public function getPaginatedData(int $perPage = 5);
}
