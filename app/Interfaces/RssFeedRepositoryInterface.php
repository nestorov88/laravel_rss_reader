<?php

namespace App\Interfaces;

interface RssFeedRepositoryInterface
{
    public function store(string $title, string $url);

    public function getPaginatedData(int $perPage = 5);

    public function delete(int $id);

    public function getFeedByUrlLike(string $url);
}
