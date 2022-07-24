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
            $this->translationService->run();
            $this->markdownService->run();
        } catch (\Throwable $e) {
            \Log::error("jobs error - ", $e->getMessage());
        }
    }
}
