<?php

namespace App\Http\Controllers;


use App\Interfaces\RssFeedServiceInterface;
use App\Jobs\FetchRssFeedJob;
use Illuminate\Http\RedirectResponse;

class RssFeedController extends Controller
{

    public function index(RssFeedServiceInterface $service) {

        return view('rss.feeds.index', [
            'urls' => $service->getPaginatedData()
        ]);
    }

    public function create() {
        return view('rss.feeds.create');
    }


    public function store(RssFeedServiceInterface $service): RedirectResponse {
        try {
            $feed = $service->store(request()->only(['title', 'url']));

            FetchRssFeedJob::dispatch([$feed->url]);
        } catch (\Exception $exception) {

            return redirect()->back()->withErrors($exception->getMessage());
        }

        return redirect()->route('url.index')->with('status', 'Feed added successfully.');

    }


    /**
     * Deleting
     * @param $id
     * @param RssFeedServiceInterface $service
     * @return RedirectResponse
     */
    public function delete($id, RssFeedServiceInterface $service): RedirectResponse {

        try {

            $deleted = $service->delete($id);

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }



        return redirect()->route('url.index')->with('status', 'Feed deleted successfully.');
    }
}
