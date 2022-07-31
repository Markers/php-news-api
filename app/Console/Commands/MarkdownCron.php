<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\MarkdownService;

class MarkdownCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'markdown:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '마크다운이 없는 파일을 생성함';

    public function __construct()
    {
        parent::__construct();
        $this->markdownService = new MarkdownService();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $result = $this->markdownService->run();
            if ($result === 'success') {
                \Log::info('markdownService is finished.');
            }
        } catch (\Throwable $e) {
            \Log::error($e->getMessage());
            throw $e;
        }
    }
}
