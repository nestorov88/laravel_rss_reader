<?php

namespace App\Http\Controllers;


class RssFeedController extends Controller
{

    public function index() {
        return view('rss.feeds.index');
    }

    public function create() {
        return view('rss.feeds.create');
    }

    public function store() {

    }


    public function destroy($id) {

    }
}
