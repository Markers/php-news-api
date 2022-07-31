<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CrawlingService;
use App\Services\MarkdownService;
use App\Services\TranslationService;
use App\Services\ThumbnailService;

class TranslationCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translation:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '번역 작업을 실행합니다.';


    public function __construct()
    {
        parent::__construct();
        $this->crawlingService = new CrawlingService();
        $this->translationService = new TranslationService();
        $this->markdownService = new MarkdownService();
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
            // $this->crawlingService->run();
            // \Log::info('CrawlingService is finished.');
            // $this->translationService->run();
            // \Log::info('translationService is finished.');
            // $this->markdownService->run();
            // \Log::info('markdownService is finished.');
            $this->thumbnailService->run();
            \Log::info('thumbnailService is finished.');
        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
