<?php

namespace App\Interfaces;

interface RssFeedServiceInterface
{
    public function store($data);

    public function getPaginatedData(int $perPage = 5);

    public function delete(int $id);
}
