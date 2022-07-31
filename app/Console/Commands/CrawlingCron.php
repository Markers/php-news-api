<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CrawlingService;

class CrawlingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawling:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '새로운 글이 있는지 크롤링 함';

    public function __construct()
    {
        parent::__construct();
        $this->crawlingService = new CrawlingService();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $result = $this->crawlingService->run();
            if ($result === 'success') {
                \Log::info('crawlingService is finished.');
            }
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
