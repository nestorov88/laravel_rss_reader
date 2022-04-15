<?php

namespace App\Http\Controllers;


use App\Interfaces\RssItemsServiceInterface;

class RssFeedItemsController extends Controller
{
    public function index(RssItemsServiceInterface $service) {
        return view('rss.items.index', [
            'items' => $service->getPaginatedData()
        ]);
    }
}
