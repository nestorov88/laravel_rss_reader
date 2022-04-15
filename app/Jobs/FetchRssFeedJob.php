<?php

namespace App\Jobs;

use App\Interfaces\RssFetcherInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchRssFeedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private array $urls;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $urls)
    {
        $this->urls = $urls;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(RssFetcherInterface $fetcher)
    {
        $fetcher->fetchFeedItems($this->urls);
    }
}
