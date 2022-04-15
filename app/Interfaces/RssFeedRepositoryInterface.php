<?php

namespace App\Interfaces;

use App\Models\RssFeed;
use Illuminate\Pagination\LengthAwarePaginator;


interface RssFeedRepositoryInterface
{
    public function store(string $title, string $url) : RssFeed;

    public function getPaginatedData(int $perPage = 5) : LengthAwarePaginator;

    public function delete(int $id) : bool;
}
