<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ThumbnailService;

class ThumbnailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'thumbnail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '번역된 썸네일이 없는 애들을 생성함.';

    public function __construct()
    {
        parent::__construct();
        $this->thumbnailService = new ThumbnailService();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $result = $this->thumbnailService->run();
            if ($result === 'success') {
                \Log::info('thumbnailService is finished.');
            }
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
