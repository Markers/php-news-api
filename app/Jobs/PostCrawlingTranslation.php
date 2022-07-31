<?php

namespace App\Jobs;

use App\Services\CrawlingService;
use App\Services\MarkdownService;
use App\Services\TranslationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PostCrawlingTranslation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected CrawlingService $crawlingService;
    protected TranslationService $translationService;
    protected MarkdownService $markdownService;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->crawlingService = new CrawlingService();
        $this->translationService = new TranslationService();
        $this->markdownService = new MarkdownService();
        $this->thumbnailService = new ThumbnailService();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $this->crawlingService->run();
            \Log::info('CrawlingService is finished.');
            $this->translationService->run();
            \Log::info('translationService is finished.');
            $this->markdownService->run();
            \Log::info('markdownService is finished.');
            $this->thumbnailService->run();
            \Log::info('thumbnailService is finished.');
        } catch (\Throwable $e) {
            \Log::error("jobs error - ", $e->getMessage());
        }
    }
}
